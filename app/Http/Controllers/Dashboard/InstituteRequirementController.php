<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\InstituteRequirementRequest;
use App\Models\InstituteRequirement;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InstituteRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instituteRequirements = InstituteRequirement::with(['department:id,name'])->latest()->paginate(10);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.institute_requirements.index', compact('instituteRequirements', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InstituteRequirementRequest $request)
    {
        $data = $request->only(['department_id']);
        
        // Handle file upload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('institute_requirements', $fileName, 'public');
            $data['file_path'] = $fileName;
        }
        
        InstituteRequirement::create($data);
        return redirect()->route('institute_requirements.index')->with('success', 'تم إضافة متطلبات المعهد بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InstituteRequirementRequest $request, string $id)
    {
        $instituteRequirement = InstituteRequirement::findOrFail($id);
        $data = $request->only(['department_id']);
        
        // Handle file upload
        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($instituteRequirement->file_path) {
                Storage::disk('public')->delete('institute_requirements/' . $instituteRequirement->file_path);
            }
            
            // Upload new file
            $file = $request->file('file_path');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('institute_requirements', $fileName, 'public');
            $data['file_path'] = $fileName;
        }
        
        $instituteRequirement->update($data);
        return redirect()->route('institute_requirements.index')->with('success', 'تم تحديث متطلبات المعهد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instituteRequirement = InstituteRequirement::findOrFail($id);
        
        // Delete associated file
        if ($instituteRequirement->file_path) {
            Storage::disk('public')->delete('institute_requirements/' . $instituteRequirement->file_path);
        }
        
        $instituteRequirement->delete();
        return redirect()->route('institute_requirements.index')->with('success', 'تم حذف متطلبات المعهد بنجاح');
    }
}
