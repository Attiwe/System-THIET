<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ImportedBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImportedBooksController extends Controller
{
    public function index()
    {
        $books = ImportedBook::orderBy('created_at', 'desc')->paginate(20);
        return view('pages.imported_books.index', compact('books'));
    }

    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:xlsx,xls,csv,txt|max:20480',
        ], [
            'file.required' => 'الرجاء اختيار ملف',
            'file.file' => 'الملف غير صالح',
            'file.mimes' => 'الملف يجب أن يكون Excel أو CSV',
            'file.max' => 'أقصى حجم للملف 20MB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());

        $rows = [];
        if ($extension === 'csv' || $extension === 'txt') {
            $rows = $this->parseCsv($file->getPathname());
        } else {
            $rows = $this->parseExcel($file->getPathname());
        }

        if (empty($rows)) {
            return redirect()->back()->with('error', 'لم يتم العثور على بيانات صالحة في الملف');
        }

        $created = 0;
        $now = now();
        $insertPayload = [];
        foreach ($rows as $row) {
            $insertPayload[] = [
                'issue_date' => $row['issue_date'] ?? null,
                'row_number' => $row['row_number'] ?? null,
                'book_name' => $row['book_name'] ?? null,
                'author' => $row['author'] ?? null,
                'general_number' => $row['general_number'] ?? null,
                'topics' => $row['topics'] ?? null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        if (!empty($insertPayload)) {
            // Chunk insert to avoid large single query
            foreach (array_chunk($insertPayload, 500) as $chunk) {
                ImportedBook::insert($chunk);
                $created += count($chunk);
            }
        }

        return redirect()->route('imported-books.index')
            ->with('success', 'تم استيراد ' . $created . ' سجل بنجاح');
    }

    private function parseCsv(string $path): array
    {
        $handle = fopen($path, 'r');
        if ($handle === false) {
            return [];
        }

        $rows = [];
        $headerMap = null;
        while (($data = fgetcsv($handle)) !== false) {
            // Skip empty lines
            if (count(array_filter($data, fn($v) => $v !== null && $v !== '')) === 0) {
                continue;
            }

            if ($headerMap === null) {
                $headerMap = $this->buildHeaderMap($data);
                // If headers are not present, assume fixed order
                if ($headerMap === []) {
                    // Push back the first line as data
                    $rows[] = $this->rowFromArray($data, []);
                }
                continue;
            }

            $rows[] = $this->rowFromArray($data, $headerMap);
        }

        fclose($handle);
        return $rows;
    }

    private function parseExcel(string $path): array
    {
        try {
            if (!class_exists('PhpOffice\\PhpSpreadsheet\\IOFactory')) {
                return [];
            }
            $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReaderForFile($path);
            $spreadsheet = $reader->load($path);
            $sheet = $spreadsheet->getActiveSheet();

            $rows = [];
            $headerMap = null;
            foreach ($sheet->toArray() as $rowIndex => $rowValues) {
                if (count(array_filter($rowValues, fn($v) => $v !== null && $v !== '')) === 0) {
                    continue;
                }
                if ($rowIndex === 0) {
                    $headerMap = $this->buildHeaderMap($rowValues);
                    if ($headerMap === []) {
                        $rows[] = $this->rowFromArray($rowValues, []);
                    }
                    continue;
                }
                $rows[] = $this->rowFromArray($rowValues, $headerMap);
            }
            return $rows;
        } catch (\Throwable $e) {
            return [];
        }
    }

    private function buildHeaderMap(array $headers): array
    {
        $normalized = array_map(function ($h) {
            $h = trim((string)$h);
            $h = mb_strtolower($h);
            return $h;
        }, $headers);

        $map = [];
        foreach ($normalized as $index => $name) {
            if (in_array($name, ['تاريخ الاصدار', 'تاريخ الإصدار', 'issue_date'])) {
                $map['issue_date'] = $index;
            } elseif (in_array($name, ['رقم الصف', 'row_number'])) {
                $map['row_number'] = $index;
            } elseif (in_array($name, ['اسم الكتاب', 'book_name'])) {
                $map['book_name'] = $index;
            } elseif (in_array($name, ['المولف', 'المؤلف', 'author'])) {
                $map['author'] = $index;
            } elseif (in_array($name, ['الرقم العام', 'general_number'])) {
                $map['general_number'] = $index;
            } elseif (in_array($name, ['الموضيع', 'المواضيع', 'topics'])) {
                $map['topics'] = $index;
            }
        }

        return $map;
    }

    private function rowFromArray(array $rowValues, array $headerMap): array
    {
        // If no header map, assume fixed order: issue_date, row_number, book_name, author, general_number, topics
        if (empty($headerMap)) {
            return [
                'issue_date' => $this->normalizeDate($rowValues[0] ?? null),
                'row_number' => $this->toString($rowValues[1] ?? null),
                'book_name' => $this->toString($rowValues[2] ?? null),
                'author' => $this->toString($rowValues[3] ?? null),
                'general_number' => $this->toString($rowValues[4] ?? null),
                'topics' => $this->toString($rowValues[5] ?? null),
            ];
        }

        return [
            'issue_date' => $this->normalizeDate($rowValues[$headerMap['issue_date']] ?? null),
            'row_number' => $this->toString($rowValues[$headerMap['row_number']] ?? null),
            'book_name' => $this->toString($rowValues[$headerMap['book_name']] ?? null),
            'author' => $this->toString($rowValues[$headerMap['author']] ?? null),
            'general_number' => $this->toString($rowValues[$headerMap['general_number']] ?? null),
            'topics' => $this->toString($rowValues[$headerMap['topics']] ?? null),
        ];
    }

    private function toString($value): ?string
    {
        if ($value === null) return null;
        $value = is_scalar($value) ? (string)$value : json_encode($value);
        $value = trim($value);
        return $value === '' ? null : $value;
    }

    private function normalizeDate($value): ?string
    {
        if ($value === null || $value === '') return null;
        // Try common formats and Excel serial dates
        if (is_numeric($value)) {
            // Excel serial number (rough conversion, assumes 1900-based)
            $base = \DateTime::createFromFormat('Y-m-d', '1899-12-30');
            if ($base) {
                $base->modify('+' . (int)$value . ' days');
                return $base->format('Y-m-d');
            }
        }
        $ts = strtotime((string)$value);
        if ($ts !== false) {
            return date('Y-m-d', $ts);
        }
        return null;
    }
}


