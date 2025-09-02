<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\OfficeStudentRequest;
use App\Models\OfficeStudent;
use App\Models\Department;
use App\Models\LevelAccadmic;
use Illuminate\Support\Facades\Cache;


class OfficeStudentController extends Controller
{
    public function index()
    {
        $students = OfficeStudent::with(['department:id,name', 'level:id,level_name'])
            ->latest()
            ->get();
        $departments = Department::select('id', 'name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->get();

        return view('pages.office_students.index', compact('students', 'departments', 'levels'));
    }

    public function create()
    {
        return view('pages.office_students.create');
    }

    public function store(OfficeStudentRequest $request)
    {
        $data = $request->validated();
        OfficeStudent::create($data);
        return redirect()->route('office_students.index')->with('success', 'تم اضافة طالب جديد بنجاح');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $student = OfficeStudent::findOrFail($id);

        return view('pages.office_students.edit', compact('student', 'departments', 'levels'));
    }


    public function update(OfficeStudentRequest $request, string $id)
    {
        $data = $request->validated();
        $student = OfficeStudent::findOrFail($id);
        $student->update($data);

        return redirect()->route('office_students.index')->with('success', 'تم تحديث طالب بنجاح');
    }


    public function destroy(string $id)
    {
        $student = OfficeStudent::findOrFail($id);
        $student->delete();
        return redirect()->route('office_students.index')->with('success', 'تم حذف طالب بنجاح');
    }
}
