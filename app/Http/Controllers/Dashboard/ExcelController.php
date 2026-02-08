<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class ExcelController extends Controller
{
    // Preview Excel قبل الحفظ
    public function previewExcel(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        $data = Excel::toArray([], $request->file('file'));
        $sheetData = $data[0]; // ناخد أول Sheet

        if(count($sheetData) > 0){
            $columns = array_keys($sheetData[0]); // أسماء الأعمدة
        } else {
            $columns = [];
        }

        return view('dashboard.preview', compact('sheetData','columns'));
    }

    // حفظ Excel في قاعدة البيانات
    public function importExcel(Request $request)
    {
        $request->validate([
            'sheetData' => 'required|string',
            'columns'   => 'required|string',
        ]);

        $sheetData = json_decode($request->sheetData, true);
        $columns = json_decode($request->columns, true);

        if(!is_array($sheetData) || !is_array($columns)){
            return redirect()->route('excel.upload.form')->with('error', 'خطأ في بيانات الملف');
        }

        // حفظ البيانات كـ JSON
        foreach($sheetData as $row){
            $dataArray = [];
            foreach($columns as $col){
                $dataArray[$col] = $row[$col] ?? null;
            }
            DB::table('excel_data')->insert([
                'data' => json_encode($dataArray, JSON_UNESCAPED_UNICODE),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->route('excel.data')->with('success', 'تم استيراد البيانات بنجاح!');
    }

    // عرض جميع البيانات
    public function index()
    {
        $data = DB::table('excel_data')->orderBy('id', 'desc')->get();
        $allData = [];
        $columns = [];
        
        // إحصائيات
        $stats = [
            'total_records' => 0,
            'total_columns' => 0,
            'unique_authors' => [],
            'unique_publishers' => [],
            'unique_classifications' => [],
            'unique_languages' => [],
            'years' => [],
            'last_updated' => null,
            'first_record_date' => null,
            'records_by_month' => [],
        ];

        foreach($data as $row){
            $decoded = json_decode($row->data, true);
            if($decoded){
                $allData[] = array_merge(['id' => $row->id], $decoded);
                
                // جمع جميع الأعمدة من جميع الصفوف
                foreach(array_keys($decoded) as $col){
                    if(!in_array($col, $columns)){
                        $columns[] = $col;
                    }
                }
                
                // جمع الإحصائيات
                $stats['total_records']++;
                
                // إحصائيات المؤلفين
                if(isset($decoded['author']) && !empty($decoded['author'])){
                    $author = trim($decoded['author']);
                    if(!in_array($author, $stats['unique_authors'])){
                        $stats['unique_authors'][] = $author;
                    }
                }
                
                // إحصائيات الناشرين
                if(isset($decoded['publisher']) && !empty($decoded['publisher'])){
                    $publisher = trim($decoded['publisher']);
                    if(!in_array($publisher, $stats['unique_publishers'])){
                        $stats['unique_publishers'][] = $publisher;
                    }
                }
                
                // إحصائيات التصنيفات
                if(isset($decoded['classification']) && !empty($decoded['classification'])){
                    $classification = trim($decoded['classification']);
                    if(!in_array($classification, $stats['unique_classifications'])){
                        $stats['unique_classifications'][] = $classification;
                    }
                }
                
                // إحصائيات اللغات
                if(isset($decoded['language']) && !empty($decoded['language'])){
                    $language = trim($decoded['language']);
                    if(!in_array($language, $stats['unique_languages'])){
                        $stats['unique_languages'][] = $language;
                    }
                }
                
                // إحصائيات السنوات
                if(isset($decoded['year']) && !empty($decoded['year'])){
                    $year = trim($decoded['year']);
                    if(!isset($stats['years'][$year])){
                        $stats['years'][$year] = 0;
                    }
                    $stats['years'][$year]++;
                }
                
                // تاريخ آخر تحديث
                if($stats['last_updated'] === null || $row->updated_at > $stats['last_updated']){
                    $stats['last_updated'] = $row->updated_at;
                }
                
                // تاريخ أول سجل
                if($stats['first_record_date'] === null || $row->created_at < $stats['first_record_date']){
                    $stats['first_record_date'] = $row->created_at;
                }
                
                // إحصائيات حسب الشهر
                $month = date('Y-m', strtotime($row->created_at));
                if(!isset($stats['records_by_month'][$month])){
                    $stats['records_by_month'][$month] = 0;
                }
                $stats['records_by_month'][$month]++;
            }
        }
        
        $stats['total_columns'] = count($columns);
        $stats['unique_authors_count'] = count($stats['unique_authors']);
        $stats['unique_publishers_count'] = count($stats['unique_publishers']);
        $stats['unique_classifications_count'] = count($stats['unique_classifications']);
        $stats['unique_languages_count'] = count($stats['unique_languages']);
        $stats['years_count'] = count($stats['years']);
        
        // ترتيب السنوات
        krsort($stats['years']);
        
        // ترتيب الشهور
        krsort($stats['records_by_month']);

        return view('dashboard.data', compact('allData', 'columns', 'stats'));
    }

    // عرض صفحة التعديل
    public function edit($id)
    {
        $row = DB::table('excel_data')->where('id', $id)->first();
        if(!$row){
            return redirect()->route('excel.data')->with('error', 'السجل غير موجود');
        }

        $data = json_decode($row->data, true);
        return response()->json([
            'id' => $row->id,
            'data' => $data
        ]);
    }

    // تحديث البيانات
    public function update(Request $request, $id)
    {
        $request->validate([
            'data' => 'required|array',
        ]);

        $row = DB::table('excel_data')->where('id', $id)->first();
        if(!$row){
            return response()->json(['success' => false, 'message' => 'السجل غير موجود'], 404);
        }

        DB::table('excel_data')
            ->where('id', $id)
            ->update([
                'data' => json_encode($request->data, JSON_UNESCAPED_UNICODE),
                'updated_at' => now(),
            ]);

        return response()->json(['success' => true, 'message' => 'تم التحديث بنجاح']);
    }

    // حذف البيانات
    public function destroy($id)
    {
        $row = DB::table('excel_data')->where('id', $id)->first();
        if(!$row){
            return response()->json(['success' => false, 'message' => 'السجل غير موجود'], 404);
        }

        DB::table('excel_data')->where('id', $id)->delete();

        return response()->json(['success' => true, 'message' => 'تم الحذف بنجاح']);
    }
}
