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

});