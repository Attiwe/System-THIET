<?php

use App\Http\Controllers\Dashboard\DeanSpeechController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\DetailNewsController;
use App\Http\Controllers\Dashboard\ManagementController;
use App\Http\Controllers\Dashboard\FacultyMembersController;
use App\Http\Controllers\Dashboard\AcademicYearController;

//========================Route Dashboard (Home)=======================
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

//=======================Route News====================================
Route::resource('dean_speech', DeanSpeechController::class)->names('dean_speech')->except(['show','destroy']);

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
