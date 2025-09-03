<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\DepartmentRequest;
use App\Services\DepartmentServices;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

    public function store(DepartmentRequest $request)
    {
        $data = $request->except(['requerd_file', 'dapart_image']);
        if ($request->hasFile('requerd_file')) {
            $data['requerd_file'] = $this->storeFile($request, 'department-file', 'requerd_file', 'department-file');
        }
        if ($request->hasFile('dapart_image')) {
            $data['dapart_image'] = $this->storeFile($request, 'department-image', 'dapart_image', 'department-image');
        }
        $this->departmentService->store($data);
        return redirect()->route('departments.index')->with('success', 'تم اضافة القسم بنجاح');
    }

    public function edit($department)
    {
        $department = $this->departmentService->checkId($department);
        return view('pages.department.edit', compact('department'));
    }

    public function update(DepartmentRequest $request)
    {
        $department = $this->departmentService->checkId($request->id);

        $data = $request->except(['requerd_file', 'dapart_image']);

        if ($request->hasFile('requerd_file')) {
            $this->deleteFile($department->requerd_file, 'department-file');
            $data['requerd_file'] = $this->storeFile($request, 'department-file', 'requerd_file', 'department-file');
        }

        if ($request->hasFile('dapart_image')) {
            $this->deleteFile($department->dapart_image, 'department-image');
            $data['dapart_image'] = $this->storeFile($request, 'department-image', 'dapart_image', 'department-image');
        }

        $this->departmentService->update($department->id, $data);

        return redirect()->route('departments.index')->with('success', 'تم تحديث القسم بنجاح');
    }


    public function destroy($id)
    {
        $department = $this->departmentService->delete($id);
        $this->deleteFile($department->requerd_file, 'department-file');
        $this->deleteFile($department->dapart_image, 'department-image');
        return redirect()->route('departments.index')->with('success', 'تم حذف القسم بنجاح');
    }

    private function deleteFile($path, $disk)
    {
        if (!$path)
            return;

        if (Storage::disk($disk)->exists($path)) {
            Storage::disk($disk)->delete($path);
        }
    }

    private function storeFile($request, $folder, $file, $disk)
    {
        if ($request->hasFile($file)) {
            $filename = Str::uuid() . '.' . $request->file($file)->getClientOriginalExtension();
            $path = $request->file($file)->storeAs($folder, $filename, $disk);
            return $path;
        }
    }

}
