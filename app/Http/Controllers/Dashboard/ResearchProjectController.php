<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\ResearchProjectRequest;
use App\Models\ResearchProject;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResearchProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $researchProjects = ResearchProject::with(['department:id,name'])->latest()->paginate(10);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.research_projects.index', compact('researchProjects', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResearchProjectRequest $request)
    {
        $data = $request->only(['department_id', 'doctor_name', 'research_name', 'research_title', 'research_summary']);
        
        // Handle file upload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('research_projects', $fileName, 'public');
            $data['file_path'] = $fileName;
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('research_projects/images', $imageName, 'public');
            $data['image'] = $imageName;
        }
        
        ResearchProject::create($data);
        return redirect()->route('research_projects.index')->with('success', 'تم إضافة مشروع البحث بنجاح');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ResearchProjectRequest $request, string $id)
    {
        $researchProject = ResearchProject::findOrFail($id);
        $data = $request->only(['department_id', 'doctor_name', 'research_name', 'research_title', 'research_summary']);
        
        // Handle file upload
        if ($request->hasFile('file_path')) {
            // Delete old file if exists
            if ($researchProject->file_path) {
                Storage::disk('public')->delete('research_projects/' . $researchProject->file_path);
            }
            
            // Upload new file
            $file = $request->file('file_path');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('research_projects', $fileName, 'public');
            $data['file_path'] = $fileName;
        }
        
        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($researchProject->image) {
                Storage::disk('public')->delete('research_projects/images/' . $researchProject->image);
            }
            
            // Upload new image
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('research_projects/images', $imageName, 'public');
            $data['image'] = $imageName;
        }
        
        $researchProject->update($data);
        return redirect()->route('research_projects.index')->with('success', 'تم تحديث مشروع البحث بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $researchProject = ResearchProject::findOrFail($id);
        
        // Delete associated files
        if ($researchProject->file_path) {
            Storage::disk('public')->delete('research_projects/' . $researchProject->file_path);
        }
        
        if ($researchProject->image) {
            Storage::disk('public')->delete('research_projects/images/' . $researchProject->image);
        }
        
        $researchProject->delete();
        return redirect()->route('research_projects.index')->with('success', 'تم حذف مشروع البحث بنجاح');
    }
}
