<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\ClassArmController;
use App\Http\Controllers\StudentResultController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SubjectTeacherController;
use App\Http\Controllers\AcademicSessionController;

use App\Http\Controllers\FormTeacherController;






Route::get('/', function () {
    return view('home');
});



Route::get('/about', function () {
    return view('about');
});



Route::get('/contact', function () {
    return view('contact');
});


Route::get('/blog', function () {
    return view('blog');
});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/students/excelUpload', [StudentController::class, 'excelUpload'])->name('students.excelUpload');
Route::post('/students/import', [StudentController::class, 'import'])->name('students.import');



Route::resource("students", StudentController::class);
Route::post('students/{id}/deactivate', [StudentController::class, 'deactivate'])->name('students.deactivate');
Route::post('students/{id}/activate', [StudentController::class, 'activate'])->name('students.activate');


Route::resource("staff", StaffController::class);

// Route::post('staff/{id}/deactivate', [StaffController::class, 'deactivate'])->name('staff.deactivate');
Route::post('staff/{id}/deactivate', [StaffController::class, 'deactivate'])->name('staff.deactivate');
Route::post('staff/{id}/activate', [StaffController::class, 'activate'])->name('staff.activate');



Route::resource("terms", TermController::class);

Route::post('terms/{id}/deactivate', [TermController::class, 'deactivate'])->name('terms.deactivate');
Route::post('terms/{id}/activate', [TermController::class, 'activate'])->name('terms.activate');



Route::resource("classes", ClassesController::class);

Route::post('classes/{id}/deactivate', [ClassesController::class, 'deactivate'])->name('classes.deactivate');
Route::post('classes/{id}/activate', [ClassesController::class, 'activate'])->name('classes.activate');




Route::resource("classarms", ClassArmController::class);


Route::post('classarms/{id}/deactivate', [ClassArmController::class, 'deactivate'])->name('classarms.deactivate');
Route::post('classarms/{id}/activate', [ClassArmController::class, 'activate'])->name('classarms.activate');



Route::resource("academic_sessions", AcademicSessionController::class);

Route::post('academic_sessions/{id}/deactivate', [AcademicSessionController::class, 'deactivate'])->name('academic_sessions.deactivate');
Route::post('academic_sessions/{id}/activate', [AcademicSessionController::class, 'activate'])->name('academic_sessions.activate');


Route::resource("subjects", SubjectController::class);
Route::post('subjects/{id}/deactivate', [SubjectController::class, 'deactivate'])->name('subjects.deactivate');
Route::post('subjects/{id}/activate', [SubjectController::class, 'activate'])->name('subjects.activate');



Route::get('/roles_permissions', [RolePermissionController::class, 'index'])->name('roles_permissions.index');
Route::get('/roles_permissions/create', [RolePermissionController::class, 'create'])->name('roles_permissions.create');
Route::post('/roles', [RolePermissionController::class, 'storeRole'])->name('roles.store');
Route::post('/permissions', [RolePermissionController::class, 'storePermission'])->name('permissions.store');
Route::post('/assign_permission', [RolePermissionController::class, 'assignPermission'])->name('permissions.assign');
Route::post('/revoke_permission', [RolePermissionController::class, 'revokePermission'])->name('permissions.revoke');

Route::get('/roles/{role}/permissions/', [RolePermissionController::class, 'getRolePermissions'])->name('roles.permissons.get');


    Route::get('/subject-teachers', [SubjectTeacherController::class, 'index'])->name('subject_teachers.index');

    Route::get('/subject-teachers/create', [SubjectTeacherController::class, 'create'])->name('subject_teachers.create');
    Route::post('/subject-teachers', [SubjectTeacherController::class, 'store'])->name('subject_teachers.store');

    Route::get('/form-teachers', [FormTeacherController::class, 'index'])->name('form_teachers.index');
    Route::post('/form-teachers', [FormTeacherController::class, 'store'])->name('form_teachers.store');




// Route::middelware(['auth'])->group(function(){
    Route::get('/teacher/results', [StudentResultController::class, 'index'])->name('student_results.index');
    Route::get('/teacher/results/create', [StudentResultController::class, 'create'])->name('student_results.create');
    Route::post('/teacher/results/store', [StudentResultController::class, 'store'])->name('student_results.store');
    Route::get('/teacher/results/view', [StudentResultController::class, 'viewBySubject'])->name('student_results.viewBySubject');


    // Route::post('/teacher/get-students/', [StudentResultController::class, 'getStudents'])->name('student_results.getStudents');
    Route::get('/teacher/upload_results', [StudentResultController::class, 'uploadResult'])->name('student_results.teacher.uploadResult');

    Route::post('/teacher/results/storeupload', [StudentResultController::class, 'storeUpload'])->name('student_results.storeUpload');
    Route::post('/teacher/get-students', [StudentResultController::class, 'getStudents'])->name('student_results.getStudents');
    Route::post('/teacher/get-results', [StudentResultController::class, 'getResults'])->name('student_results.getResults');
    
    Route::post('/teacher/get-master-results', [StudentResultController::class, 'getMasterResults'])->name('student_results.getMasterResults');


    Route::get('/teacher/masterresult', [StudentResultController::class, 'masterresult'])->name('student_results.masterresult');

    Route::get('/teacher/reportcard', [StudentResultController::class, 'reportcard'])->name('student_results.reportcard');









// })


















require __DIR__.'/auth.php';
