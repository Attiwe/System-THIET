<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\StudentProjectRequest;
use App\Models\Department;
use App\Models\StudentProject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class StudentProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentProjects = StudentProject::with(['department:id,name'])->latest()->get();
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.student_projects.index', compact('studentProjects', 'departments'));
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
        return view('pages.student_projects.create_page', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentProjectRequest $request)
    {
        $data = $request->only(['department_id', 'doctor_name', 'project_name', 'description']);
        
        // Handle image upload
        if ($request->hasFile('image_work')) {
            $image = $request->file('image_work');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('student_projects/images', $imageName, 'public');
            $data['image_work'] = $imageName;
        }
        
        // Handle PDF file upload
        if ($request->hasFile('project_pdf')) {
            $file = $request->file('project_pdf');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('student_projects/pdfs', $fileName, 'public');
            $data['project_pdf'] = $fileName;
        }
        
        try {
            StudentProject::create($data);
            return redirect()->route('studentProjects.index')->with('success', 'تم إضافة المشروع الطلابي بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentProject $studentProject)
    {
        $studentProject->load('department');
        return view('pages.student_projects.show', compact('studentProject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $studentProject = StudentProject::findOrFail($id);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.student_projects.edit', compact('studentProject', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentProjectRequest $request, $id)
    {
        $studentProject = StudentProject::findOrFail($id);
        $data = $request->only(['department_id', 'doctor_name', 'project_name', 'description']);
        
        // Handle image upload
        if ($request->hasFile('image_work')) {
            // Delete old image if exists
            if ($studentProject->image_work) {
                Storage::disk('public')->delete('student_projects/images/' . $studentProject->image_work);
            }
            
            // Upload new image
            $image = $request->file('image_work');
            $imageName = time() . '_' . Str::random(10) . '.' . $image->getClientOriginalExtension();
            $image->storeAs('student_projects/images', $imageName, 'public');
            $data['image_work'] = $imageName;
        }
        
        // Handle PDF file upload
        if ($request->hasFile('project_pdf')) {
            // Delete old file if exists
            if ($studentProject->project_pdf) {
                Storage::disk('public')->delete('student_projects/pdfs/' . $studentProject->project_pdf);
            }
            
            // Upload new file
            $file = $request->file('project_pdf');
            $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('student_projects/pdfs', $fileName, 'public');
            $data['project_pdf'] = $fileName;
        }
        
        try {
            $studentProject->update($data);
            return redirect()->route('studentProjects.index')->with('success', 'تم تحديث المشروع الطلابي بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $studentProject = StudentProject::findOrFail($id);
        
        try {
            // Delete associated files
            if ($studentProject->image_work) {
                Storage::disk('public')->delete('student_projects/images/' . $studentProject->image_work);
            }
            if ($studentProject->project_pdf) {
                Storage::disk('public')->delete('student_projects/pdfs/' . $studentProject->project_pdf);
            }
            
            $studentProject->delete();
            return redirect()->route('studentProjects.index')->with('success', 'تم حذف المشروع الطلابي بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'حدث خطأ: ' . $e->getMessage());
        }
    }

    /**
     * Show project image
     */
    public function showImage(string $id)
    {
        $studentProject = StudentProject::findOrFail($id);
        $imagePath = $studentProject->image_work;

        if (!$imagePath || !Storage::disk('public')->exists('student_projects/images/' . $imagePath)) {
            abort(404, 'Project image not found');
        }

        $fullPath = storage_path('app/public/student_projects/images/' . $imagePath);
        return response()->file($fullPath);
    }

    /**
     * Show project PDF file
     */
    public function showPdf(string $id)
    {
        $studentProject = StudentProject::findOrFail($id);
        $filePath = $studentProject->project_pdf;

        if (!$filePath || !Storage::disk('public')->exists('student_projects/pdfs/' . $filePath)) {
            abort(404, 'Project PDF not found');
        }

        $fullPath = storage_path('app/public/student_projects/pdfs/' . $filePath);
        return response()->file($fullPath);
    }
}
