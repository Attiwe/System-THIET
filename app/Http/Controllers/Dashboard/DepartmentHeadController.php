<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\DepartmentHeadRequest;
use App\Models\DepartmentHead;
use App\Models\Department;
use App\Models\FacultyMembers;
use Illuminate\Http\Request;


class DepartmentHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $departmentHeads = DepartmentHead::with(['department', 'facultyMembers'])->get();
        $departments = Department::where('is_active', true)->select('id', 'name')->get();
        $facultyMembers = FacultyMembers::select('id', 'name')->get();
        return view('pages.department_heads.index', compact('departmentHeads', 'departments', 'facultyMembers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $departments = Department::where('is_active', true)->get();
    //     $facultyMembers = FacultyMembers::all();
    //     return view('pages.department_heads.create', compact('departments', 'facultyMembers'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepartmentHeadRequest $request)
    {
        DepartmentHead::create($request->all());
        return redirect()->route('department_heads.index')->with('success', 'تم إضافة رئيس القسم بنجاح');
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
    public function edit(string $id)
    {
        $departmentHead = DepartmentHead::findOrFail($id);
        $departments = Department::where('is_active', true)->get();
        $facultyMembers = FacultyMembers::all();
        return view('pages.department_heads.edit', compact('departmentHead', 'departments', 'facultyMembers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepartmentHeadRequest $request, string $id)
    {
        $departmentHead = DepartmentHead::findOrFail($id);
        $departmentHead->update($request->all());
        return redirect()->route('department_heads.index')->with('success', 'تم تحديث رئيس القسم بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $departmentHead = DepartmentHead::findOrFail($id);
        $departmentHead->delete();
        return redirect()->route('department_heads.index')->with('success', 'تم حذف رئيس القسم بنجاح');
    }
}