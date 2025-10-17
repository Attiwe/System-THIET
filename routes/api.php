<?php

use App\Http\Controllers\Api\V1\DepartmentController;
use App\Http\Controllers\Api\V1\DepartmentHeadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\SilderController;
use App\Http\Controllers\Api\V1\UnitInstitutesController;
use App\Http\Controllers\Api\V1\OrganizationStructureController;
use App\Http\Controllers\Api\V1\InstituteBoardMemberController;
use App\Http\Controllers\Api\V1\AcademicCouncilController;
use App\Http\Controllers\Api\V1\DepartmentPlanController;
use App\Http\Controllers\Api\V1\FacultyMembersController;
use App\Http\Controllers\Api\V1\VideosDepartmentController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::prefix('v1')->group(function () {
   
  //=====================Route Sliders ========================================
  Route::get('sliders', [SilderController::class, 'index'])->name('sliders.index');

  //=====================Route about Institutes ========================================
  Route::get('about/institute', [UnitInstitutesController::class, 'index']);

  //=====================Route Organization Structure ========================================
  Route::get('organization/structure', [OrganizationStructureController::class, 'index']);

  //=====================Route institute board members ======================================
  Route::get('institute/board/members', [InstituteBoardMemberController::class, 'index']);

  //=====================Route academic councils ======================================
  Route::get('academic/councils', [AcademicCouncilController::class, 'index']);

  //=====================Route departments ======================================
  Route::get('departments', [DepartmentController::class, 'index']);

  //=====================Route department heads ======================================
  Route::get('department-heads', [DepartmentHeadController::class, 'index']);

  //=====================Route department plans controller ======================================
  Route::controller(DepartmentPlanController::class)->group(function () {
  
    //===============Route  خطة البحث	==============
    //===============Route Basic sciences ==============
    Route::get('department-plans/basic-sciences', 'BasicSciencesPlan');

    //===============Route Computer Engineering Plan ========== 
    Route::get('department-plans/computer-engineering', 'ComputerEngineeringPlan');

    //===============Route Construction and building engineering ==============
    Route::get('department-plans/construction-and-building-engineering', 'ConstructionAndBuildingEngineeringPlan');

    //===============Route Chemical Engineering Plan ==============
    Route::get('department-plans/chemical-engineering', 'ChemicalEngineeringPlan');


    // ************************************************************************************************************
    // ************************************************************************************************************
    
    
    //===============Route  اللائحة الداخلية	=================================
     //===============Route Basic sciences ==============
     Route::get('department-regulations/basic-sciences', 'BasicSciencesRegulations');

     //===============Route Computer Engineering Plan ========== 
     Route::get('department-regulations/computer-engineering', 'ComputerEngineeringRegulations');
 
     //===============Route Construction and building engineering ==============
     Route::get('department-regulations/construction-and-building-engineering', 'ConstructionAndBuildingEngineeringRegulations');
 
     //===============Route Chemical Engineering Plan ==============
     Route::get('department-regulations/chemical-engineering', 'ChemicalEngineeringRegulations');


    // ************************************************************************************************************
    // ************************************************************************************************************
    
     //===============Route      كتاب القسم		=================================
     //===============Route Basic sciences ==============
     Route::get('department-books/basic-sciences', 'BasicSciencesBooks');

     //===============Route Computer Engineering Plan ========== 
     Route::get('department-books/computer-engineering', 'ComputerEngineeringBooks');
 
     //===============Route Construction and building engineering ==============
     Route::get('department-books/construction-and-building-engineering', 'ConstructionAndBuildingEngineeringBooks');
 
     //===============Route Chemical Engineering Plan ==============
     Route::get('department-books/chemical-engineering', 'ChemicalEngineeringBooks');

     // ************************************************************************************************************
    // ************************************************************************************************************
    
     //===============Route      المقررات الدراسية		=================================
     //===============Route Basic sciences ==============
     Route::get('department-courses/basic-sciences', 'BasicSciencesCourses');

     //===============Route Computer Engineering Plan ========== 
     Route::get('department-courses/computer-engineering', 'ComputerEngineeringCourses');
 
     //===============Route Construction and building engineering ==============
      Route::get('department-courses/construction-and-building-engineering', 'ConstructionAndBuildingEngineeringCourses');
 
     //===============Route Chemical Engineering Plan ==============
     Route::get('department-courses/chemical-engineering', 'ChemicalEngineeringCourses');
      
 // ************************************************************************************************************
    // ************************************************************************************************************
    
     //===============Route        مجلس القسم		=================================
     //===============Route Basic sciences ==============
     Route::get('department-council/basic-sciences', 'BasicSciencesCouncil');

     //===============Route Computer Engineering Plan ========== 
     Route::get('department-council/computer-engineering', 'ComputerEngineeringCouncil');
 
     //===============Route Construction and building engineering ==============
      Route::get('department-council/construction-and-building-engineering', 'ConstructionAndBuildingEngineeringCouncil');
 
     //===============Route Chemical Engineering Plan ==============
     Route::get('department-council/chemical-engineering', 'ChemicalEngineeringCouncil');

  });

  //=====================Route facultyMembers ======================================
  Route::controller(FacultyMembersController::class)->prefix('faculty-members')->group(function () {
      //===============Route Basic sciences ==============
      Route::get('basic-sciences', 'BasicSciencesPlan');

      //===============Route Computer Engineering Plan ========== 
      Route::get('computer-engineering', 'ComputerEngineeringPlan');

      //===============Route Construction and building engineering ==============
      Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineeringPlan');

      //===============Route Chemical Engineering Plan ==============
      Route::get('chemical-engineering', 'ChemicalEngineeringPlan');

  });

  //=====================Route Videos Departments ========================================
  // Route::get('videos-departments', [VideosDepartmentController::class, 'index'])->name('videos-departments.index');
  // Route::post('videos-departments', [VideosDepartmentController::class, 'store'])->name('videos-departments.store');
  // Route::get('videos-departments/{id}', [VideosDepartmentController::class, 'show'])->name('videos-departments.show');
  // Route::put('videos-departments/{id}', [VideosDepartmentController::class, 'update'])->name('videos-departments.update');
  // Route::delete('videos-departments/{id}', [VideosDepartmentController::class, 'destroy'])->name('videos-departments.destroy');
  // Route::get('videos-departments/department/{department}', [VideosDepartmentController::class, 'getByDepartment'])->name('videos-departments.by-department');
  // Route::get('videos-departments/{id}/video', [VideosDepartmentController::class, 'showVideo'])->name('videos-departments.video');





});