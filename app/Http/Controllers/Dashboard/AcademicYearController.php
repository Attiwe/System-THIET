<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\AcademicYearRequest;
use App\Models\AcademicYears;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $academicYears = AcademicYears::get();
        return view('pages.academic_years.index',compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.academic_years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicYearRequest $request)
    {
         AcademicYears::create($request->all());
        return redirect()->route('academic_years.index')->with('success','تم اضافة السنة الدراسية بنجاح');
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcademicYearRequest $request, string $id)
    {
        $academicYear = AcademicYears::findOrFail($id);
        $academicYear->update($request->all());
        return redirect()->route('academic_years.index')->with('success','تم تحديث السنة الدراسية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $academicYear = AcademicYears::findOrFail($id);
        $academicYear->delete();
        return redirect()->route('academic_years.index')->with('success','تم حذف السنة الدراسية بنجاح');
    }
}
