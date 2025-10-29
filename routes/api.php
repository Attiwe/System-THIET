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
use App\Http\Controllers\Api\V1\InstituteRequirementsController;
use App\Http\Controllers\Api\V1\LabController;
use App\Http\Controllers\Api\V1\ClassTrainingController;
use App\Http\Controllers\Api\V1\ScientificTripController;
use App\Http\Controllers\Api\V1\ResearchProjectController;
use App\Http\Controllers\Api\V1\StudentProjectController;
use App\Http\Controllers\Api\V1\MasterisDoctoralThesesController;


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
  // Route::get('departments', [DepartmentController::class, 'index']);
  Route::controller(DepartmentController::class)->prefix('departments/')->group(function () {
    Route::get('basic-sciences', 'BasicSciences');
    Route::get('computer-engineering', 'ComputerEngineering');
    Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');
    Route::get('chemical-engineering', 'ChemicalEngineering');
  });


  //=====================Route department heads ======================================
  // Route::get('department-heads', [DepartmentHeadController::class, 'index']);
  Route::controller(DepartmentHeadController::class)->prefix('department-heads')->group(function () {
    Route::get('basic-sciences', 'BasicSciences');
    Route::get('computer-engineering', 'ComputerEngineering');
    Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');
    Route::get('chemical-engineering', 'ChemicalEngineering');
  });


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


  //=======================Route InstituteRequirement ======================
  Route::controller(InstituteRequirementsController::class)->prefix('institute-requirements')->group(function(){
      
    //===============Route Basic sciences ==============
     Route::get('basic-sciences', 'BasicSciences');

     //===============Route Computer Engineering Plan ========== 
     Route::get('computer-engineering', 'ComputerEngineering');
 
     //===============Route Construction and building engineering ==============
      Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');
 
     //===============Route Chemical Engineering Plan ==============
     Route::get('chemical-engineering', 'ChemicalEngineering');
  }); 

  //=======================Route Labs ======================
  Route::controller(LabController::class)->prefix('labs')->group(function(){
    //===============Route Basic sciences ==============
     Route::get('basic-sciences', 'BasicSciences');

     //===============Route Computer Engineering ========== 
     Route::get('computer-engineering', 'ComputerEngineering');

     //===============Route Construction and building engineering ==============
     Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');

     //===============Route Chemical Engineering ==============
     Route::get('chemical-engineering', 'ChemicalEngineering');
  });

  //=======================Route ClassTrainings ======================
  Route::controller(ClassTrainingController::class)->prefix('class-trainings')->group(function(){
    //===============Route Basic sciences ==============
     Route::get('basic-sciences', 'BasicSciences');

     //===============Route Computer Engineering ========== 
     Route::get('computer-engineering', 'ComputerEngineering');

     //===============Route Construction and building engineering ==============
     Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');

     //===============Route Chemical Engineering ==============
     Route::get('chemical-engineering', 'ChemicalEngineering');
  });

  //=======================Route ScientificTrips ======================
  Route::controller(ScientificTripController::class)->prefix('scientific-trips')->group(function(){
    //===============Route Basic sciences ==============
     Route::get('basic-sciences', 'BasicSciences');

     //===============Route Computer Engineering ========== 
     Route::get('computer-engineering', 'ComputerEngineering');

     //===============Route Construction and building engineering ==============
     Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');

     //===============Route Chemical Engineering ==============
     Route::get('chemical-engineering', 'ChemicalEngineering');
  });

  //=======================Route ResearchProjects ======================
  Route::controller(ResearchProjectController::class)->prefix('research-projects')->group(function(){
    //===============Route Basic sciences ==============
     Route::get('basic-sciences', 'BasicSciences');

     //===============Route Computer Engineering ========== 
     Route::get('computer-engineering', 'ComputerEngineering');

     //===============Route Construction and building engineering ==============
     Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');

     //===============Route Chemical Engineering ==============
     Route::get('chemical-engineering', 'ChemicalEngineering');
  });

  //=======================Route StudentProjects ======================
  Route::controller(StudentProjectController::class)->prefix('student-projects')->group(function(){
    //===============Route Basic sciences ==============
     Route::get('basic-sciences', 'BasicSciences');

     //===============Route Computer Engineering ========== 
     Route::get('computer-engineering', 'ComputerEngineering');

     //===============Route Construction and building engineering ==============
     Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');

     //===============Route Chemical Engineering ==============
     Route::get('chemical-engineering', 'ChemicalEngineering');
  });

  //=======================Route MasterisDoctoralTheses ======================
  Route::controller(MasterisDoctoralThesesController::class)->prefix('masteris-doctoral-theses')->group(function(){
    Route::get('/', 'index');
    Route::get('basic-sciences', 'BasicSciences');
    Route::get('construction-and-building-engineering', 'ConstructionAndBuildingEngineering');
    Route::get('chemical-engineering', 'ChemicalEngineering');
    Route::get('computer-engineering', 'ComputerEngineering');
  });



//********************************************** The End ************************************************** */  
});