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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = OfficeStudent::with(['department', 'level'])->latest()->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->get();

        return view('pages.office_students.index', compact('students', 'departments', 'levels'));
    }

    public function create()
    {
        $departments = Cache::remember(
            'departments_list',
            60,
            fn() =>
            Department::select('id', 'name')->get()
        );

        $levels = Cache::remember(
            'levels_list',
            60,
            fn() =>
            LevelAccadmic::select('id', 'level_name')->get()
        );

        return view('pages.office_students.create', compact('departments', 'levels'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(OfficeStudentRequest $request)
    {
        $data = $request->validated();

        OfficeStudent::create($data);

        return redirect()->route('office_students.index')->with('success', 'تم اضافة طالب جديد بنجاح');
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
        $student = OfficeStudent::findOrFail($id);
        $departments = Cache::remember(
            'departments_list',
            60,
            fn() =>
            Department::select('id', 'name')->get()
        );

        $levels = Cache::remember(
            'levels_list',
            60,
            fn() =>
            LevelAccadmic::select('id', 'level_name')->get()
        );


        return view('pages.office_students.edit', compact('student', 'departments', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OfficeStudentRequest $request, string $id)
    {
        $data = $request->validated();

        $student = OfficeStudent::findOrFail($id);
        $student->update($data);

        return redirect()->route('office_students.index')->with('success', 'تم تحديث طالب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = OfficeStudent::findOrFail($id);
        $student->delete();
        return redirect()->route('office_students.index')->with('success', 'تم حذف طالب بنجاح');
    }
}
