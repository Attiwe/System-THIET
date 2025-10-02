<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\MilitaryEducation;
use App\Http\Requests\dashboard\MilitaryEducationRequest;
use Illuminate\Http\Request;

class MilitaryEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $militaryEducations = MilitaryEducation::latest()->get();
        return view('pages.military-education.index', compact('militaryEducations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.military-education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MilitaryEducationRequest $request)
    {
        MilitaryEducation::create($request->validated());
        
        return redirect()->route('military-education.index')
            ->with('success', 'تم إضافة التربية العسكرية بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(MilitaryEducation $militaryEducation)
    {
        return view('pages.military-education.show', compact('militaryEducation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MilitaryEducation $militaryEducation)
    {
        return view('pages.military-education.edit', compact('militaryEducation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MilitaryEducationRequest $request, MilitaryEducation $militaryEducation)
    {
        $militaryEducation->update($request->validated());
        
        return redirect()->route('military-education.index')
            ->with('success', 'تم تحديث التربية العسكرية بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MilitaryEducation $militaryEducation)
    {
        $militaryEducation->delete();
        
        return redirect()->route('military-education.index')
            ->with('success', 'تم حذف التربية العسكرية بنجاح');
    }
}
