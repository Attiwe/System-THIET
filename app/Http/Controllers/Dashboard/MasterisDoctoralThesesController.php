<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\MasterisDoctoralThesesRequest;
use App\Models\Department;
use App\Models\MasterisDoctoralTheses;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class MasterisDoctoralThesesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theses = MasterisDoctoralTheses::with(['department:id,name'])->latest()->get();
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.masteris_doctoral_theses.index', compact('theses', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Modal creation handled in index view
    }

    /**
     * Show the form for creating a new resource in a separate page.
     */
    public function createPage()
    {
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.masteris_doctoral_theses.create_page', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MasterisDoctoralThesesRequest $request)
    {
        $data = $request->only(['department_id', 'doctor_name', 'title_thesis', 'description', 'type']);
        
        // Handle PDF file upload
        if ($request->hasFile('thesis_pdf')) {
            $file = $request->file('thesis_pdf');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('theses', $fileName, 'public');
            $data['thesis_pdf'] = $fileName;
        }
        
        try {
            MasterisDoctoralTheses::create($data);
            return redirect()->route('masterisDoctoralTheses.index')->with('success', 'تم إضافة الرسالة/الأطروحة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterisDoctoralTheses $masterisDoctoralThesis)
    {
        $masterisDoctoralThesis->load('department');
        return view('pages.masteris_doctoral_theses.show', compact('masterisDoctoralThesis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $thesis = MasterisDoctoralTheses::findOrFail($id);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.masteris_doctoral_theses.edit', compact('thesis', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MasterisDoctoralThesesRequest $request, $id)
    {
        $thesis = MasterisDoctoralTheses::findOrFail($id);
        $data = $request->only(['department_id', 'doctor_name', 'title_thesis', 'description', 'type']);
        
        // Handle PDF file upload
        if ($request->hasFile('thesis_pdf')) {
            // Delete old file if exists
            if ($thesis->thesis_pdf) {
                Storage::disk('public')->delete('theses/' . $thesis->thesis_pdf);
            }
            
            // Upload new file
            $file = $request->file('thesis_pdf');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('theses', $fileName, 'public');
            $data['thesis_pdf'] = $fileName;
        }
        
        try {
            $thesis->update($data);
            return redirect()->route('masterisDoctoralTheses.index')->with('success', 'تم تحديث الرسالة/الأطروحة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $thesis = MasterisDoctoralTheses::findOrFail($id);
        
        try {
            // Delete associated file
            if ($thesis->thesis_pdf) {
                Storage::disk('public')->delete('theses/' . $thesis->thesis_pdf);
            }
            
            $thesis->delete();
            return redirect()->route('masterisDoctoralTheses.index')->with('success', 'تم حذف الرسالة/الأطروحة بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Show thesis PDF file
     */
    public function showThesisPdf(string $id)
    {
        $thesis = MasterisDoctoralTheses::findOrFail($id);
        $filePath = $thesis->thesis_pdf;

        if (!$filePath || !Storage::disk('public')->exists('theses/' . $filePath)) {
            abort(404, 'Thesis PDF not found');
        }

        $fullPath = storage_path('app/public/theses/' . $filePath);
        return response()->file($fullPath);
    }
}
