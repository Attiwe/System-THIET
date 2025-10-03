<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\StudentRights;
use App\Http\Requests\dashboard\StudentRightsRequest;
use Illuminate\Http\Request;

class StudentRightsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentRights = StudentRights::latest()->get();
        return view('pages.student-rights.index', compact('studentRights'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.student-rights.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRightsRequest $request)
    {
        try {
            StudentRights::create($request->validated());
            
            return redirect()->route('student-rights.index')
                ->with('success', 'تم إضافة حقوق الطلاب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة حقوق الطلاب: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentRights $studentRight)
    {
        return view('pages.student-rights.show', compact('studentRight'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentRights $studentRight)
    {
        return view('pages.student-rights.edit', compact('studentRight'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRightsRequest $request, StudentRights $studentRight)
    {
        try {
            $studentRight->update($request->validated());
            
            return redirect()->route('student-rights.index')
                ->with('success', 'تم تحديث حقوق الطلاب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث حقوق الطلاب: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentRights $studentRight)
    {
        try {
            $studentRight->delete();
            
            return redirect()->route('student-rights.index')
                ->with('success', 'تم حذف حقوق الطلاب بنجاح');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف حقوق الطلاب: ' . $e->getMessage());
        }
    }
}
