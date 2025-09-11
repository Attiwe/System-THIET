<?php

use App\Http\Controllers\Dashboard\DeanSpeechController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\DetailNewsController;
use App\Http\Controllers\Dashboard\ManagementController;
use App\Http\Controllers\Dashboard\FacultyMembersController;
use App\Http\Controllers\Dashboard\AcademicYearController;
use App\Http\Controllers\Dashboard\CategoryManagementController;
use App\Http\Controllers\Dashboard\SettingController;
use App\Http\Controllers\Dashboard\OfficeStudentController;
use App\Http\Controllers\Dashboard\QualityFormController;
use App\Http\Controllers\Dashboard\QualityItemController;
use App\Http\Controllers\Dashboard\DepartmentController;
use App\Http\Controllers\Dashboard\FeaturedWorkController;
use App\Http\Controllers\Dashboard\StudentOpinionsController;
use App\Http\Controllers\Dashboard\LibraryOpinionController;
use App\Http\Controllers\Dashboard\ArticleController;
use App\Http\Controllers\Dashboard\NewElementsController;
use App\Http\Controllers\Dashboard\SliderController;
use App\Http\Controllers\Dashboard\UnitController;

 
//========================Route Dashboard (Home)=======================
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//=======================Route News====================================
Route::resource('dean_speech', DeanSpeechController::class)->names('dean_speech')->except(['show','destroy']);

//=====================Route New Elements================================
Route::resource('new_elements', NewElementsController::class)->names('new_elements')->except(['show']);

//=====================Route Details News==============================
Route::resource('detailsNews', DetailNewsController::class)->names('detailsNews')->except(['show']);

//=====================Route Management================================
Route::resource('management', ManagementController::class)->names('management')->except(['show']);
Route::get('/resume/{id}', [ManagementController::class, 'showResume'])->name('resume.show');


//======================Route facultyMembers============================
Route::resource('facultyMembers', FacultyMembersController::class)->names('facultyMembers')->except(['show']);
Route::get('/resume/{id}', [FacultyMembersController::class, 'showResume'])->name('resume.show');
Route::get('/researches/{id}', [FacultyMembersController::class, 'showResume'])->name('researches.show');

//=====================Route Academic Year==============================
Route::resource('academic_years', AcademicYearController::class)->names('academic_years')->except(['show']);

//=====================Route Category Management==============================
Route::resource('category_management', CategoryManagementController::class)->names('category_management')->except(['show']);

//=====================Route Setting========================================
Route::resource('setting', SettingController::class)->names('setting')->except(['show']);

//=====================Route Office Student================================
Route::resource('office_students', OfficeStudentController::class)->names('office_students')->except(['show']);

//=====================Route Quality Form================================
Route::resource('quality_form', QualityFormController::class)->names('quality_form')->except(['show']);
Route::get('/quality_form/trashed', [QualityFormController::class, 'trashed'])->name('quality_form.trashed');
Route::get('/quality_form/restore/{id}', [QualityFormController::class, 'restore'])->name('quality_form.restore');
Route::delete('/quality_form/forceDelete/{id}', [QualityFormController::class, 'forceDelete'])->name('quality_form.forceDelete');

//=====================Route Quality Item   ================================
Route::resource('quality_item', QualityItemController::class)->names('quality_item')->except(['show']);
Route::get('/quality_item/trashed', [QualityItemController::class, 'trashed'])->name('quality_item.trashed');
Route::get('/quality_item/restore/{id}', [QualityItemController::class, 'restore'])->name('quality_item.restore');
Route::delete('/quality_item/forceDelete/{id}', [QualityItemController::class, 'forceDelete'])->name('quality_item.forceDelete');

//=====================Route Department ================================
Route::resource('departments', DepartmentController::class)->names('departments')->except(['show']);
Route::get('/department/requerd_file/{id}', [DepartmentController::class, 'file'])->name('department.file');
 
//=====================Route Featured Work ================================
Route::resource('featured_work', FeaturedWorkController::class)->names('featured_work')->except(['show']);
Route::get('/featured_work/trashed', [FeaturedWorkController::class, 'trashed'])->name('featured_work.trashed');
Route::get('/featured_work/restore/{id}', [FeaturedWorkController::class, 'restore'])->name('featured_work.restore');
Route::delete('/featured_work/forceDelete/{id}', [FeaturedWorkController::class, 'forceDelete'])->name('featured_work.forceDelete');

//=====================Route Student Opinions ================================
Route::resource('studentOpinions', StudentOpinionsController::class)->names('studentOpinions')->except(['show']);
Route::get('/studentOpinions/trashed', [StudentOpinionsController::class, 'trashed'])->name('studentOpinions.trashed');
Route::get('/studentOpinions/restore/{id}', [StudentOpinionsController::class, 'restore'])->name('studentOpinions.restore');
Route::delete('/studentOpinions/forceDelete/{id}', [StudentOpinionsController::class, 'forceDelete'])->name('studentOpinions.forceDelete');

//=====================Rote library Opinions ==================================
Route::resource('libraryOpinions', LibraryOpinionController::class)->names('libraryOpinions')->except(['show']);

//=====================Route articles =======================================
Route::resource('articles', ArticleController::class)->names('articles')->except(['show']);

//=====================Route Sliders ========================================
Route::resource('sliders', SliderController::class)->names('slider')->except(['show']);

//=====================Route Unit ========================================
Route::resource('unit', UnitController::class)->names('unit')->except(['show']);


Route::get('/', function () {
  return view('login-test.test-login');
});
