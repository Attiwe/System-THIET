<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\dashboard\StudyMaterialsRequest;
use App\Models\StudyMaterials;
use App\Models\Department;
use App\Models\LevelAccadmic;
use Illuminate\Http\Request;


class StudyMaterialsController extends Controller
{
    public function index()
    {
        $studyMaterials = StudyMaterials::with(['department', 'level'])->latest()->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.study-materials.index', compact('studyMaterials', 'departments', 'levels'));
    }

    public function create()
    {
        return view('pages.study-materials.create');
    }

    public function store(StudyMaterialsRequest $request)
    {
        foreach ($request->study_material as $material) {
            StudyMaterials::create([
                'study_material' => $material['study_material'],
                'department_id' => $material['department_id'],
                'level_id' => $material['level_id'],
            ]);
        }

        return redirect()->back()->with('success', 'تمت إضافة المواد الدراسية بنجاح');
    }

    public function edit(StudyMaterials $studyMaterial)
    {
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        return view('pages.study-materials.edit', compact('studyMaterial', 'departments', 'levels'));
    }

    public function update(StudyMaterialsRequest $request, StudyMaterials $studyMaterial)
    {
        $materials = $request->input('study_material');

        foreach ($materials as $material) {
            if (!empty($material['id'])) {
                $studyMaterialRecord = StudyMaterials::find($material['id']);
                if ($studyMaterialRecord) {
                    $studyMaterialRecord->update([
                        'study_material' => $material['study_material'],
                        'department_id' => $material['department_id'],
                        'level_id' => $material['level_id'],
                    ]);
                }
            } else {
                StudyMaterials::create([
                    'study_material' => $material['study_material'],
                    'department_id' => $material['department_id'],
                    'level_id' => $material['level_id'],
                ]);
            }
        }

        return redirect()->route('study_materials.index')->with('success', 'تم تحديث المادة الدراسية بنجاح ✅');
    }


    public function destroy(StudyMaterials $studyMaterial)
    {
        $studyMaterial->delete();

        return redirect()->route('study_materials.index')->with('success', 'تم حذف المواد الدراسية بنجاح');
    }


    public function preparatoryEngineering(){
        $studyMaterials = StudyMaterials::with(['department', 'level'])->where('department_id', 1 )->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studyMaterials->isEmpty()){
            return redirect()->route('study_materials.index')->with('success', 'لا يوجد مواد دراسية');
        }
        return view('pages.study-materials.preparatory_engineering', compact('studyMaterials', 'departments', 'levels'));
    }

    public function civilEngineering(){
        $studyMaterials = StudyMaterials::with(['department', 'level'])->where('department_id', 2 )->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studyMaterials->isEmpty()){
            return redirect()->route('study_materials.index')->with('success', 'لا يوجد مواد دراسية');
        }
        return view('pages.study-materials.civil_engineering', compact('studyMaterials', 'departments', 'levels'));
    }


    public function communicationsEngineering(){
        $studyMaterials = StudyMaterials::with(['department', 'level'])->where('department_id', 4 )->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studyMaterials->isEmpty()){
            return redirect()->route('study_materials.index')->with('success', 'لا يوجد مواد دراسية');
        }
        return view('pages.study-materials.communications_engineering', compact('studyMaterials', 'departments', 'levels'));
    }

    
    public function chemicalEngineering(){
        $studyMaterials = StudyMaterials::with(['department', 'level'])->where('department_id', 3 )->get();
        $departments = Department::select('id', 'name')->orderBy('name')->get();
        $levels = LevelAccadmic::select('id', 'level_name')->orderBy('level_name')->get();
        
        if($studyMaterials->isEmpty()){
            return redirect()->route('study_materials.index')->with('success', 'لا يوجد مواد دراسية');
        }
        return view('pages.study-materials.chemical_engineering', compact('studyMaterials', 'departments', 'levels'));
    }

}
