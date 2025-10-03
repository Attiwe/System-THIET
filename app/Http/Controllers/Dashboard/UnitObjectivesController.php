<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\UnitObjectivesRequest;
use App\Models\UnitObjectives;
use App\Models\Unit;
use Illuminate\Http\Request;

class UnitObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitObjectives = UnitObjectives::with('unit')->latest()->get();
        $units = Unit::orderBy('name')->get();
        
        return view('pages.unit-objectives.index', compact('unitObjectives', 'units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $units = Unit::orderBy('name')->get();
        return view('pages.unit-objectives.create', compact('units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitObjectivesRequest $request)
    {
        try {
            UnitObjectives::create($request->validated());
            
            return redirect()->route('unit-objectives.index')
                ->with('success', 'تم إضافة أهداف الوحدة بنجاح');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة أهداف الوحدة: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitObjectives $unitObjective)
    {
        $unitObjective->load('unit');
        return view('pages.unit-objectives.show', compact('unitObjective'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitObjectives $unitObjective)
    {
        $units = Unit::orderBy('name')->get();
        return view('pages.unit-objectives.edit', compact('unitObjective', 'units'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitObjectivesRequest $request, UnitObjectives $unitObjective)
    {
        try {
            $unitObjective->update($request->validated());
            
            return redirect()->route('unit-objectives.index')
                ->with('success', 'تم تحديث أهداف الوحدة بنجاح');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث أهداف الوحدة: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitObjectives $unitObjective)
    {
        try {
            $unitObjective->delete();
            
            return redirect()->route('unit-objectives.index')
                ->with('success', 'تم حذف أهداف الوحدة بنجاح');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف أهداف الوحدة: ' . $e->getMessage());
        }
    }
}
