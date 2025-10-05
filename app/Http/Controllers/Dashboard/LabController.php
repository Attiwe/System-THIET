<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\LabRequest;
use App\Models\Lab;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $labs = Lab::with(['department:id,name'])->latest()->paginate(10);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.labs.index', compact('labs', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LabRequest $request)
    {
        $data = $request->only(['department_id', 'lab_name']);
        
        // Handle file upload
        if ($request->hasFile('lab_pdf')) {
            $file = $request->file('lab_pdf');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('labs', $fileName, 'public');
            $data['lab_pdf'] = $fileName;
        }
        
        Lab::create($data);
        return redirect()->route('labs.index')->with('success', 'تم إضافة المختبر بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LabRequest $request, string $id)
    {
        $lab = Lab::findOrFail($id);
        $data = $request->only(['department_id', 'lab_name']);
        
        // Handle file upload
        if ($request->hasFile('lab_pdf')) {
            // Delete old file if exists
            if ($lab->lab_pdf) {
                Storage::disk('public')->delete('labs/' . $lab->lab_pdf);
            }
            
            // Upload new file
            $file = $request->file('lab_pdf');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('labs', $fileName, 'public');
            $data['lab_pdf'] = $fileName;
        }
        
        $lab->update($data);
        return redirect()->route('labs.index')->with('success', 'تم تحديث المختبر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $lab = Lab::findOrFail($id);
        
        // Delete associated file
        if ($lab->lab_pdf) {
            Storage::disk('public')->delete('labs/' . $lab->lab_pdf);
        }
        
        $lab->delete();
        return redirect()->route('labs.index')->with('success', 'تم حذف المختبر بنجاح');
    }
}
