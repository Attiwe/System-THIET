<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\DepartmentPlanRequest;
use App\Models\DepartmentPlan;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DepartmentPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentPlans = DepartmentPlan::with(['department:id,name'])->latest()->paginate(10);
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        return view('pages.department_plans.index', compact('departmentPlans', 'departments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $departments = Department::where('is_active', true)->get();
    //     return view('pages.department_plans.create', compact('departments'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentPlanRequest $request)
    {
        $data = $request->only(['department_id']);
        
        // Handle file uploads
        $fileFields = ['research_plan', 'law', 'department_book', 'council', 'courses'];
        
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('department_plans', $fileName, 'public');
                $data[$field] = $fileName;
            }
        }
        
        DepartmentPlan::create($data);
        return redirect()->route('department_plans.index')->with('success', 'تم إضافة خطة القسم بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //     $departmentPlan = DepartmentPlan::findOrFail($id);
    //     $departments = Department::where('is_active', true)->get();
    //     return view('pages.department_plans.edit', compact('departmentPlan', 'departments'));
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentPlanRequest $request, string $id)
    {
        $departmentPlan = DepartmentPlan::findOrFail($id);
        $data = $request->only(['department_id']);
        
        // Handle file uploads
        $fileFields = ['research_plan', 'law', 'department_book', 'council', 'courses'];
        
        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($departmentPlan->$field) {
                    Storage::disk('public')->delete('department_plans/' . $departmentPlan->$field);
                }
                
                // Upload new file
                $file = $request->file($field);
                $fileName = time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('department_plans', $fileName, 'public');
                $data[$field] = $fileName;
            }
        }
        
        $departmentPlan->update($data);
        return redirect()->route('department_plans.index')->with('success', 'تم تحديث خطة القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departmentPlan = DepartmentPlan::findOrFail($id);
        
        // Delete associated files
        $fileFields = ['research_plan', 'law', 'department_book', 'council', 'courses'];
        foreach ($fileFields as $field) {
            if ($departmentPlan->$field) {
                Storage::disk('public')->delete('department_plans/' . $departmentPlan->$field);
            }
        }
        
        $departmentPlan->delete();
        return redirect()->route('department_plans.index')->with('success', 'تم حذف خطة القسم بنجاح');
    }
}
