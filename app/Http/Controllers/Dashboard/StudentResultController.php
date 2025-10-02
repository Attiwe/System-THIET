<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StudentResult;
use App\Models\Department;
use App\Models\LevelAccadmic;
use App\Http\Requests\dashboard\StudentResultRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentResults = StudentResult::with(['department', 'level'])->latest()->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.student-results.index', compact('studentResults', 'departments', 'levels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.student-results.create', compact('departments', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentResultRequest $request)
    {
        $data = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('example_file')) {
            $file = $request->file('example_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('student-results', $fileName, 'public');
            $data['example_file'] = $filePath;
        }

        StudentResult::create($data);
        
        return redirect()->route('student-results.index')
            ->with('success', 'تم إضافة نتيجة الطالب بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentResult $studentResult)
    {
        $studentResult->load(['department', 'level']);
        return view('pages.student-results.show', compact('studentResult'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentResult $studentResult)
    {
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.student-results.edit', compact('studentResult', 'departments', 'levels'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentResultRequest $request, StudentResult $studentResult)
    {
        $data = $request->validated();
        
        // Handle file upload
        if ($request->hasFile('example_file')) {
            // Delete old file
            if ($studentResult->example_file && Storage::disk('public')->exists($studentResult->example_file)) {
                Storage::disk('public')->delete($studentResult->example_file);
            }
            
            // Upload new file
            $file = $request->file('example_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('student-results', $fileName, 'public');
            $data['example_file'] = $filePath;
        } else {
            // Keep existing file if no new file uploaded
            unset($data['example_file']);
        }

        $studentResult->update($data);
        
        return redirect()->route('student-results.index')
            ->with('success', 'تم تحديث نتيجة الطالب بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentResult $studentResult)
    {
        // Delete file from storage
        if ($studentResult->example_file && Storage::disk('public')->exists($studentResult->example_file)) {
            Storage::disk('public')->delete($studentResult->example_file);
        }
        
        $studentResult->delete();
        
        return redirect()->route('student-results.index')
            ->with('success', 'تم حذف نتيجة الطالب بنجاح');
    }

    /**
     * Department-specific methods
     */
    public function preparatoryEngineering()
    {
        $studentResults = StudentResult::with(['department', 'level'])->where('department_id', 1)->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studentResults->isEmpty()){
            return redirect()->route('student-results.index')->with('success', 'لا يوجد نتائج طلاب');
        }
        return view('pages.student-results.preparatory_engineering', compact('studentResults', 'departments', 'levels'));
    }

    public function civilEngineering()
    {
        $studentResults = StudentResult::with(['department', 'level'])->where('department_id', 2)->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studentResults->isEmpty()){
            return redirect()->route('student-results.index')->with('success', 'لا يوجد نتائج طلاب');
        }
        return view('pages.student-results.civil_engineering', compact('studentResults', 'departments', 'levels'));
    }

    public function communicationsEngineering()
    {
        $studentResults = StudentResult::with(['department', 'level'])->where('department_id', 4)->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studentResults->isEmpty()){
            return redirect()->route('student-results.index')->with('success', 'لا يوجد نتائج طلاب');
        }
        return view('pages.student-results.communications_engineering', compact('studentResults', 'departments', 'levels'));
    }

    public function chemicalEngineering()
    {
        $studentResults = StudentResult::with(['department', 'level'])->where('department_id', 3)->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studentResults->isEmpty()){
            return redirect()->route('student-results.index')->with('success', 'لا يوجد نتائج طلاب');
        }
        return view('pages.student-results.chemical_engineering', compact('studentResults', 'departments', 'levels'));
    }
}
