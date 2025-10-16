<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AcademicCouncil;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AcademicCouncilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicCouncils = AcademicCouncil::latest()->paginate(10);
        return view('pages.academic_councils.index', compact('academicCouncils'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.academic_councils.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'pdf' => 'required|file|mimes:pdf|max:10240', 
        ]);

        try {
            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('academic_councils', $filename, 'public');
                
                if (!$path) {
                    throw new \Exception('Failed to upload file');
                }
                
                AcademicCouncil::create([
                    'pdf' => $filename,
                ]);

                return redirect()->route('academic.councils.index')
                    ->with('success', 'تم رفع ملف المجلس الأكاديمي بنجاح.');
            }
        } catch (\Exception $e) {
            \Log::error('Error uploading academic council: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء رفع الملف: ' . $e->getMessage())
                ->withInput();
        }

        return redirect()->back()
            ->with('error', 'لم يتم رفع أي ملف.')
            ->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicCouncil $academicCouncil)
    {
        return view('pages.academic_councils.show', compact('academicCouncil'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicCouncil $academicCouncil)
    {
        return view('pages.academic_councils.edit', compact('academicCouncil'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $academicCouncil = AcademicCouncil::findOrFail($request->id);

        $request->validate([
            'pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        try {
            if ($request->hasFile('pdf')) {
                $file = $request->file('pdf');
                $filename = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('academic_councils', $filename, 'public');

                if (!$path) {
                    throw new \Exception('Failed to upload file');
                }

                // ✅ update the specific record
                $academicCouncil->update([
                    'pdf' => $filename,
                ]);
            }

            return redirect()->route('academic.councils.index')
                ->with('success', 'تم تحديث ملف المجلس الأكاديمي بنجاح.');
        } catch (\Exception $e) {
            \Log::error('Error uploading academic council: ' . $e->getMessage());
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تحديث الملف: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
         \Log::info('Delete request received for Academic Council ID: ' . $request->id);
        
        try {
            // Delete file from storage
            if ($request->pdf) {
                $filePath = 'academic_councils/' . $request->pdf;
                if (Storage::disk('public')->exists($filePath)) {
                    Storage::disk('public')->delete($filePath);
                    \Log::info('File deleted from storage: ' . $filePath);
                } else {
                    \Log::warning('File not found in storage: ' . $filePath);
                }
            } else {
                \Log::info('No file to delete from storage');
            }

            // Delete record from database
            AcademicCouncil::destroy($request->id);
            \Log::info('Academic Council record deleted from database');

            return redirect()->route('academic.councils.index')
                ->with('success', 'تم حذف المجلس الأكاديمي بنجاح.');
        } catch (\Exception $e) {
            \Log::error('Error deleting academic council: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف الملف: ' . $e->getMessage());
        }
    }

    /**
     * Display PDF in browser.
     */
    public function showPdf($id)
    {
        $academicCouncil = AcademicCouncil::findOrFail($id);
        
        if (!$academicCouncil->pdf) {
            abort(404, 'PDF file not found');
        }

        $filePath = storage_path('app/public/academic_councils/' . $academicCouncil->pdf);
        
        if (!file_exists($filePath)) {
            abort(404, 'PDF file not found on disk');
        }

        return response()->file($filePath);
    }

    /**
     * Download PDF file.
     */
    public function downloadPdf($id)
    {
        $academicCouncil = AcademicCouncil::findOrFail($id);
        
        if (!$academicCouncil->pdf) {
            abort(404, 'PDF file not found');
        }

        $filePath = storage_path('app/public/academic_councils/' . $academicCouncil->pdf);
        
        if (!file_exists($filePath)) {
            abort(404, 'PDF file not found on disk');
        }

        return response()->download($filePath, 'academic_council_' . $id . '.pdf');
    }
}
