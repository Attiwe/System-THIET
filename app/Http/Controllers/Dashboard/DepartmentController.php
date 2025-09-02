<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\DepartmentServices;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    protected $departmentService;
    public function __construct(DepartmentServices $departmentService)
    {
        $this->departmentService = $departmentService;
    }

    public function index()
    {
        $departments = $this->departmentService->getAll();
        return view('pages.department.index', compact('departments'));
     }

     public function store(Request $request){
        $this->departmentService->store($request->all());
        return redirect()->route('department.index')->with('success', 'تم اضافة القسم بنجاح');
     }

     public function edit($id){
        $department = $this->departmentService->checkId($id);
        return view('pages.department.edit', compact('department'));
     }

     public function update(Request $request){
        $this->departmentService->update($request->all());
        return redirect()->route('department.index')->with('success', 'تم تحديث القسم بنجاح');
     }

     public function delete($id){
        $this->departmentService->delete($id);
        return redirect()->route('department.index')->with('success', 'تم حذف القسم بنجاح');
     }
}
