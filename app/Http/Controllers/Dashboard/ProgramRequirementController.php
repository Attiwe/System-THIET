<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ProgramRequirementRequest;
use App\Models\ProgramRequirement;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProgramRequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programRequirements = ProgramRequirement::with(['department:id,name'])->latest()->paginate(10);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.program_requirements.index', compact('programRequirements', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProgramRequirementRequest $request)
    {
        $data = $request->only(['department_id']);
        
        // Handle file upload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('program_requirements', $fileName, 'public');
            $data['file_path'] = $fileName;
        }
        
        ProgramRequirement::create($data);
        return redirect()->route('program_requirements.index')->with('success', 'تم إضافة متطلبات البرنامج بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProgramRequirementRequest $request, string $id)
    {
        $programRequirement = ProgramRequirement::findOrFail($id);
        $data = $request->only(['department_id']);
        
        // Handle file upload
        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($programRequirement->file_path) {
                Storage::disk('public')->delete('program_requirements/' . $programRequirement->file_path);
            }
            
            // Upload new file
            $file = $request->file('file_path');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('program_requirements', $fileName, 'public');
            $data['file_path'] = $fileName;
        }
        
        $programRequirement->update($data);
        return redirect()->route('program_requirements.index')->with('success', 'تم تحديث متطلبات البرنامج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $programRequirement = ProgramRequirement::findOrFail($id);
        
        // Delete associated file
        if ($programRequirement->file_path) {
            Storage::disk('public')->delete('program_requirements/' . $programRequirement->file_path);
        }
        
        $programRequirement->delete();
        return redirect()->route('program_requirements.index')->with('success', 'تم حذف متطلبات البرنامج بنجاح');
    }
}
