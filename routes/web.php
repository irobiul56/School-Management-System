<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AssignSubjectController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\Employee;
use App\Http\Controllers\Admin\ExamTypeController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentClassController;
use App\Http\Controllers\Admin\StudentFeeAmount;
use App\Http\Controllers\Admin\StudentFeeCategory;
use App\Http\Controllers\Admin\StudentGroupController;
use App\Http\Controllers\Admin\StudentShiftController;
use App\Http\Controllers\Admin\Studentyear;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::group(['middleware' => 'admin'], function(){

Route::get('/admin-dashboard', [DashboardController::class, 'admindashboard'])->name('admin.dashboard');
Route::resource('/admission', AdmissionController::class);
Route::resource('/student-class', StudentClassController::class);
Route::resource('/student-year', Studentyear::class);
Route::resource('/student-group', StudentGroupController::class);
Route::resource('/student-shift', StudentShiftController::class);
Route::resource('/student-fee-category', StudentFeeCategory::class);
Route::resource('/student-fee-amount', StudentFeeAmount::class);
Route::resource('/student-exam-type', ExamTypeController::class);
Route::resource('/student-subject', SubjectController::class);
Route::resource('/assign-subject', AssignSubjectController::class);
Route::resource('/designation', DesignationController::class);
Route::resource('/permission', PermissionController::class);
Route::resource('/role', RoleController::class);
Route::resource('/user', AdminController::class);
Route::resource('/employee', Employee::class);

Route::get('/student-form', [AdmissionController::class, 'showstudentform'])->name('show.student.form');
Route::get('/student-status{id}', [AdmissionController::class, 'studentstatus'])->name('student.data.status');
Route::get('/admission-admit-card{id}', [AdmissionController::class, 'admissionadmit'])->name('admission-admit');


Route::get('/student-fee-amount-form', [StudentFeeAmount::class, 'addfee'])->name('show.fee.add.form');
Route::get('/assign-subject-form', [AssignSubjectController::class, 'showassignsubjectform'])->name('show.assign.subject.form');
Route::get('/assign-subject-form', [AssignSubjectController::class, 'showassignsubjectform'])->name('show.assign.subject.form');

//trash Student
Route::get('/student-trash{id}', [AdmissionController::class, 'studenttrash'])->name('student-trash');
Route::get('/trash-student-show', [AdmissionController::class, 'trashstudentshow'])->name('trash-student-show');

//student Registration fee
Route::get('/registration-fee', [AdmissionController::class, 'registrationfee'])->name('registration-fee-show');
});

Route::get('/login', [FrontendController::class, 'showloginform'])->name('show.login.form');
Route::post('/user-login', [FrontendController::class, 'userlogin'])->name('user.login');
