<?php

use App\Http\Controllers\Dashboard\DeanSpeechController;
use App\Http\Controllers\Dashboard\FaqsController;
use App\Http\Controllers\Dashboard\InstituteMnagementController;
use App\Http\Controllers\Dashboard\SchedulesController;
use App\Http\Controllers\Dashboard\ScholarshipsController;
use App\Http\Controllers\Dashboard\StudyMaterialsController;
use App\Http\Controllers\Dashboard\StudentResultController;
use App\Http\Controllers\Dashboard\MilitaryEducationController;
use App\Http\Controllers\Dashboard\StudentRightsController;
use App\Http\Controllers\Dashboard\OrganizationStructureController;
use App\Http\Controllers\Dashboard\UnitObjectivesController;
use App\Http\Controllers\Dashboard\ManagementBoardsController;
use App\Http\Controllers\Dashboard\InternalPermanencyController;
use App\Http\Controllers\Dashboard\DepartmentHeadController;
use App\Http\Controllers\Dashboard\DepartmentPlanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
use App\Http\Controllers\Dashboard\InstituteBoardMemberController;
use App\Http\Controllers\Dashboard\ImportantLinkController;
use App\Http\Controllers\Dashboard\DeputyDirectorController;
use App\Http\Controllers\Dashboard\ImportantFilesController;
use App\Http\Controllers\Dashboard\LecturesDecisionsController;
use App\Http\Controllers\Dashboard\TrainingCourseController;
use App\Http\Controllers\Dashboard\FaqCategoriesController;
use App\Http\Controllers\Dashboard\FaqAskedQuestionsController;
use App\Http\Controllers\Dashboard\ActivitieController;
use App\Http\Controllers\Dashboard\InstituteController;
use App\Http\Controllers\Dashboard\ResearchProjectController;
use App\Http\Controllers\Dashboard\InstituteRequirementController;
use App\Http\Controllers\Dashboard\ProgramRequirementController;
use App\Http\Controllers\Dashboard\LabController;
use App\Http\Controllers\Dashboard\ScientificTripController;
use App\Http\Controllers\Dashboard\MasterisDoctoralThesesController;
use App\Http\Controllers\Dashboard\StudentProjectController;
use App\Http\Controllers\Dashboard\ClassTrainingController;
use App\Http\Controllers\Dashboard\AuthorController;
use App\Http\Controllers\Dashboard\PublishingController;
use App\Http\Controllers\Dashboard\PublishingAwardsController;
use App\Http\Controllers\Dashboard\UnitInstitutesController;
use App\Http\Controllers\Dashboard\AcademicCouncilController;
use App\Http\Controllers\Dashboard\VideosDepartmentController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\Dashboard\PermissionController;
use App\Http\Controllers\Dashboard\RoleAuthController;
use App\Http\Controllers\Dashboard\ImportedBooksController;
use App\Http\Controllers\Dashboard\ExcelController;



//========================Route Dashboard (Home)=======================
Route::middleware(['auth', 'role.permission'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');

// Role Authentication
Route::middleware(['auth', 'role.permission'])->group(function () {
    Route::get('/role-login', [RoleAuthController::class, 'showRoleLoginForm'])->name('role.login.form');
    Route::post('/role-login', [RoleAuthController::class, 'roleLogin'])->name('role.login');
    Route::post('/role-logout', [RoleAuthController::class, 'roleLogout'])->name('role.logout');
});

// Test route for debugging
Route::middleware('auth')->get('/test-permissions', function() {
    $user = Auth::user();
    $roleAuth = session('role_auth');
    
    return response()->json([
        'user' => $user ? $user->email : 'غير مسجل',
        'role_auth' => $roleAuth,
        'permissions' => $roleAuth ? $roleAuth['permissions'] : [],
    ]);
})->name('test.permissions');


Route::middleware('auth')->group(function () {
   
 
//=======================Route News====================================
Route::resource('dean_speech', DeanSpeechController::class)->names('dean_speech')->except(['show', 'destroy']);
Route::delete('dean_speech/{id}', [DeanSpeechController::class, 'destroy'])->name('dean_speech.destroy');

//=====================Route New Elements================================
Route::resource('new_elements', NewElementsController::class)->names('new_elements')->except(['show']);

//=====================Route Details News==============================
Route::resource('detailsNews', DetailNewsController::class)->names('detailsNews')->except(['show']);

//=====================Route Management================================
Route::resource('management', ManagementController::class)->names('management')->except(['show']);
Route::get('/resume/{id}', [ManagementController::class, 'showResume'])->name('resume.show');

//======================Route facultyMembers============================
Route::resource('facultyMembers', FacultyMembersController::class)->names('facultyMembers');
Route::get('/facultyMembers/create/page', [FacultyMembersController::class, 'createPage'])->name('facultyMembers.create.page');
Route::get('/resume/{id}', [FacultyMembersController::class, 'showResume'])->name('resume.show');
Route::get('/researches/{id}', [FacultyMembersController::class, 'showResearches'])->name('researches.show');

//=====================Route Academic Year==============================
Route::resource('academic_years', AcademicYearController::class)->names('academic_years')->except(['show']);

//=====================Route Department Head==============================
Route::resource('department_heads', DepartmentHeadController::class)->names('department_heads')->except(['show']);

//=====================Route Department Plan==============================
Route::resource('department_plans', DepartmentPlanController::class)->names('department_plans')->except(['show']);

//=====================Route Category Management==============================
Route::resource('category_management', CategoryManagementController::class)->names('category_management')->except(['show']);

//==================== Route Management Boards ========================
Route::resource('management-boards', ManagementBoardsController::class)->names('management-boards')->except(['show']);
Route::get('/management-boards/file/{filename}', function ($filename) {
    $filePath = 'public/management-boards/' . $filename;
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('management-boards.download');

//==================== Route Internal Permanencies ====================
Route::resource('internal-permanencies', InternalPermanencyController::class)->names('internal-permanencies')->except(['show']);
Route::get('/internal-permanencies/file/{filename}', function ($filename) {
    $filePath = 'public/internal-permanencies/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('internal-permanencies.download');

//==================== Route Deputy Directors =========================
Route::resource('deputy-directors', DeputyDirectorController::class)->names('deputy-directors')->except(['show']);

//==================== Route Important Files ==========================
Route::resource('important-files', ImportantFilesController::class)->names('important-files')->except(['show']);
Route::get('/important-files/file/{filename}', function ($filename) {
    $filePath = 'public/important-files/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('important-files.download');

//==================== Route Lectures Decisions =======================
Route::resource('lectures-decisions', LecturesDecisionsController::class)->names('lectures-decisions')->except(['show']);
Route::get('/lectures-decisions/file/{filename}', function ($filename) {
    $filePath = 'public/lectures-decisions/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('lectures-decisions.download');

//==================== Route Training Courses =========================
Route::resource('training-courses', TrainingCourseController::class)->names('training-courses')->except(['show']);

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

//=====================Route Institutes =   =======================================
Route::resource('institutes', InstituteController::class)->names('institutes')->except(['show']);

//=====================Route Institute Board Member ========================
Route::resource('institute_board_members', InstituteBoardMemberController::class)->names('institute_board_members')->except(['show']);
Route::get('/institute_board_members/trashed', [InstituteBoardMemberController::class, 'trashed'])->name('institute_board_members.trashed');
Route::get('/institute_board_members/restore/{id}', [InstituteBoardMemberController::class, 'restore'])->name('institute_board_members.restore');
Route::delete('/institute_board_members/forceDelete/{id}', [InstituteBoardMemberController::class, 'forceDelete'])->name('institute_board_members.forceDelete');

//=====================Route Important Link ========================
Route::resource('important_link', ImportantLinkController::class)->names('important_link')->except(['show']);

//=====================Route Faq Categories ========================
Route::resource('faqCategories', FaqCategoriesController::class)->names('faqCategories')->except(['show']);

//=====================Route Faq Asked Questions ========================
Route::resource('faqAskedQuestions', FaqAskedQuestionsController::class)->names('faqAskedQuestions')->except(['show']);

//==================== Route Activities ========================
Route::resource('activities', ActivitieController::class)->names('activities')->except(['show']);

//==================== Route Institute Management ========================
Route::resource('institute_mnagements', InstituteMnagementController::class)->names('institute_mnagements')->except(['show']);

//==================== Route Faqs ========================
Route::resource('faqs', FaqsController::class)->names('faqs')->except(['show']);

//==================== Route Scholarships ========================
Route::resource('scholarships', ScholarshipsController::class)->names('scholarships')->except(['show']);

//==================== Route Schedules ========================
Route::resource('schedules', SchedulesController::class)->names('schedules');
Route::get('/schedules/create/page', [SchedulesController::class, 'createPage'])->name('schedules.create.page');

//==================== Route Study Materials ========================
Route::resource('study_materials', StudyMaterialsController::class)->names('study_materials')->except(['show']);
Route::get('/study_materials/preparatory_engineering', [StudyMaterialsController::class, 'preparatoryEngineering'])->name('study_materials.preparatory_engineering');
Route::get('/study_materials/civilengineering', [StudyMaterialsController::class, 'civilEngineering'])->name('study_materials.civil_engineering');
Route::get('/study_materials/communications_engineering', [StudyMaterialsController::class, 'communicationsEngineering'])->name('study_materials.communications_engineering');
Route::get('/study_materials/Chemical_engineering', [StudyMaterialsController::class, 'chemicalEngineering'])->name('study_materials.chemical_engineering');

//==================== Route Student Results ========================
Route::resource('student-results', StudentResultController::class)->names('student-results')->except(['show']);
Route::get('/student-results/preparatory_engineering', [StudentResultController::class, 'preparatoryEngineering'])->name('student-results.preparatory_engineering');
Route::get('/student-results/civil_engineering', [StudentResultController::class, 'civilEngineering'])->name('student-results.civil_engineering');
Route::get('/student-results/communications_engineering', [StudentResultController::class, 'communicationsEngineering'])->name('student-results.communications_engineering');
Route::get('/student-results/chemical_engineering', [StudentResultController::class, 'chemicalEngineering'])->name('student-results.chemical_engineering');

// File download route for student results
Route::get('/student-results/file/{filename}', function ($filename) {
    $path = storage_path('app/public/student-results/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
})->name('student-results.download');

//==================== Route Military Education ========================
Route::resource('military-education', MilitaryEducationController::class)->names('military-education');

//==================== Route Student Rights ========================
Route::resource('student-rights', StudentRightsController::class)->names('student-rights');

//==================== Route Organization Structure ========================
Route::resource('organization-structure', OrganizationStructureController::class)->names('organization-structure');

// File download route for organization structure
Route::get('/organization-structure/file/{filename}', function ($filename) {
    $filePath = 'public/organization-structures/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('organization-structure.download');

//==================== Route Unit Objectives ========================
Route::resource('unit-objectives', UnitObjectivesController::class)->names('unit-objectives');

//==================== Route Research Projects ========================
Route::resource('research_projects', ResearchProjectController::class)->names('research_projects')->except(['show']);
Route::get('/research_projects/file/{filename}', function ($filename) {
    $filePath = 'public/research_projects/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('research_projects.download');

//==================== Route Institute Requirements ========================
Route::resource('institute_requirements', InstituteRequirementController::class)->names('institute_requirements')->except(['show']);
Route::get('/institute_requirements/file/{filename}', function ($filename) {
    $filePath = 'public/institute_requirements/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('institute_requirements.download');

//==================== Route Program Requirements ========================
Route::resource('program_requirements', ProgramRequirementController::class)->names('program_requirements')->except(['show']);
Route::get('/program_requirements/file/{filename}', function ($filename) {
    $filePath = 'public/program_requirements/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('program_requirements.download');

//==================== Route Labs ========================
Route::resource('labs', LabController::class)->names('labs')->except(['show']);
Route::get('/labs/file/{filename}', function ($filename) {
    $filePath = 'public/labs/' . $filename;
    
    if (!Storage::exists($filePath)) {
        abort(404);
    }
    
    return Storage::response($filePath);
})->name('labs.download');

//==================== Route Scientific Trips ========================
Route::resource('scientific_trips', ScientificTripController::class)->names('scientific_trips')->except(['show']);

//==================== Route Masteris Doctoral Theses ========================
Route::resource('masterisDoctoralTheses', MasterisDoctoralThesesController::class)->names('masterisDoctoralTheses');
Route::get('/masterisDoctoralTheses/create/page', [MasterisDoctoralThesesController::class, 'createPage'])->name('masterisDoctoralTheses.create.page');
Route::get('/masterisDoctoralTheses/pdf/{id}', [MasterisDoctoralThesesController::class, 'showThesisPdf'])->name('masterisDoctoralTheses.showPdf');

//==================== Route Student Projects ========================
Route::resource('studentProjects', StudentProjectController::class)->names('studentProjects');
Route::get('/studentProjects/create/page', [StudentProjectController::class, 'createPage'])->name('studentProjects.create.page');
Route::get('/studentProjects/image/{id}', [StudentProjectController::class, 'showImage'])->name('studentProjects.showImage');
Route::get('/studentProjects/pdf/{id}', [StudentProjectController::class, 'showPdf'])->name('studentProjects.showPdf');

//==================== Route Class Trainings ========================
Route::resource('classTrainings', ClassTrainingController::class)->names('classTrainings')->except(['show']);
Route::get('/classTrainings/image/{id}', [ClassTrainingController::class, 'showImage'])->name('classTrainings.showImage');

//==================== Route Authors ========================
Route::resource('authors', AuthorController::class)->names('authors');

//==================== Route Publishings ========================
Route::resource('publishings', PublishingController::class)->names('publishings');

//==================== Route Publishing Awards ========================
Route::resource('publishing_awards', PublishingAwardsController::class)->names('publishing_awards');

//==================== Route Unit Institutes ========================
Route::resource('about/institute', UnitInstitutesController::class)->names('unit_institutes');

//==================== Route Academic Councils ========================
Route::resource('academic/councils', AcademicCouncilController::class)->names('academic.councils');
Route::get('/academic/councils/pdf/{id}', [AcademicCouncilController::class, 'showPdf'])->name('academic.councils.showPdf');
Route::get('/academic/councils/download/{id}', [AcademicCouncilController::class, 'downloadPdf'])->name('academic.councils.download');

//==================== Route Videos Departments ========================
Route::get('/videos_departments/video/{id}', [VideosDepartmentController::class, 'showVideo'])->name('videos_departments.showVideo');
Route::resource('videos_departments', VideosDepartmentController::class)->names('videos_departments');

//==================== Route Roles Management ========================
// Temporary routes without middleware for testing
Route::middleware('auth')->group(function () {
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});

//==================== Route Permissions Management ========================
Route::middleware(['auth', 'role.permission:roles.read'])->group(function () {
    Route::get('permissions', [PermissionController::class, 'index'])->name('permissions.index');
    Route::get('permissions/{permission}', [PermissionController::class, 'show'])->name('permissions.show');
    Route::get('permissions-all', function() {
        return view('pages.permissions.all-permissions');
    })->name('permissions.all');
});

Route::middleware(['auth', 'role.permission:roles.create'])->group(function () {
    Route::get('permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
    Route::post('permissions', [PermissionController::class, 'store'])->name('permissions.store');
});

Route::middleware(['auth', 'role.permission:roles.update'])->group(function () {
    Route::get('permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
    Route::put('permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
});

Route::middleware(['auth', 'role.permission:roles.delete'])->group(function () {
    Route::delete('permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');
});

//==================== Route Imported Books (Excel Upload) ========================
// Route::middleware('auth')->group(function () {
//     Route::get('imported-books', [ImportedBooksController::class, 'index'])->name('imported-books.index');
//     Route::post('imported-books/upload', [ImportedBooksController::class, 'upload'])->name('imported-books.upload');
// });

  
 

//==================== Route Books (Excel Library) ========================
Route::get('/dashboard/upload', function(){
    return view('dashboard.upload');
})->name('excel.upload.form');

Route::post('/dashboard/preview', [ExcelController::class, 'previewExcel'])->name('excel.preview');
Route::post('/dashboard/import', [ExcelController::class, 'importExcel'])->name('excel.import');
Route::get('/dashboard/data', [ExcelController::class, 'index'])->name('excel.data');
Route::get('/dashboard/data/{id}/edit', [ExcelController::class, 'edit'])->name('excel.edit');
Route::put('/dashboard/data/{id}', [ExcelController::class, 'update'])->name('excel.update');
Route::delete('/dashboard/data/{id}', [ExcelController::class, 'destroy'])->name('excel.destroy');


 


Route::get('/', function () {
  return redirect()->route('login');
});


});

 