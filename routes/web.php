<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\AssignSubjectController;
use App\Http\Controllers\Admin\ClasswiseResultsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DefaultController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\Employee;
use App\Http\Controllers\Admin\ExamTypeController;
use App\Http\Controllers\Admin\FinalExamResult;
use App\Http\Controllers\Admin\FinalExamResultController;
use App\Http\Controllers\Admin\GradepointController;
use App\Http\Controllers\Admin\MarksController;
use App\Http\Controllers\Admin\MonthlyExamController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\StudentClassController;
use App\Http\Controllers\Admin\StudentFeeAmount;
use App\Http\Controllers\Admin\StudentFeeCategory;
use App\Http\Controllers\Admin\StudentGroupController;
use App\Http\Controllers\Admin\StudentShiftController;
use App\Http\Controllers\Admin\Studentyear;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TutorialExamController;
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

//Marks Management
Route::resource('/marks-management', MarksController::class);
Route::get('/get-subject/{id}', [DefaultController::class, 'getsubject'])->name('get.subject');
Route::get('/get-student', [DefaultController::class, 'getstudent'])->name('get.student');
Route::get('/get-student-edit-marks', [DefaultController::class, 'getstudenteditmarks'])->name('get.student.edit.marks');
Route::post('/student-edit-marks', [DefaultController::class, 'marksedit'])->name('student.edit.marks');
Route::get('/get-student-marks', [MarksController::class, 'getstudentmarks'])->name('get.student.marks');

//Grade Point
Route::get('/grade-point-avarage', [GradepointController::class, 'gradepointavarage'])->name('grade.point.avarage');
Route::resource('/grade-point', GradepointController::class);

//Tutorial Marks Management
Route::resource('/tutorial-exam', TutorialExamController::class);
Route::get('/tutorial-marks-show', [TutorialExamController::class, 'tutorialmarkshow'])->name('tutorial.marks.show');
Route::get('/tutorial-edit-marks', [TutorialExamController::class, 'tutorialeditmarks'])->name('tutorial.edit.marks');
Route::post('/tutorial-marks-update', [TutorialExamController::class, 'tutorialdataupdate'])->name('tutorial.marks.update');

//Tutorial Marks Management
Route::resource('/monthly-exam', MonthlyExamController::class);

//Final Exam Result
Route::resource('/results', FinalExamResultController::class);
Route::resource('/class-wise-results', ClasswiseResultsController::class);

//publish result
Route::post('/publish-result', [FinalExamResultController::class, 'publishresult'])->name('publish.result');
Route::get('/final-class-results', [ClasswiseResultsController::class, 'finalclasswiseresult'])->name('final.class.wise.result');



Route::get('/student-form', [AdmissionController::class, 'showstudentform'])->name('show.student.form');
Route::get('/student-status{id}', [AdmissionController::class, 'studentstatus'])->name('student.data.status');
Route::get('/admission-admit-card{id}', [AdmissionController::class, 'admissionadmit'])->name('admission-admit');
Route::get('/user-pdf', [AdminController::class, 'userpdf'])->name('user.pdf');


Route::get('/student-fee-amount-form', [StudentFeeAmount::class, 'addfee'])->name('show.fee.add.form');
Route::get('/assign-subject-form', [AssignSubjectController::class, 'showassignsubjectform'])->name('show.assign.subject.form');
Route::get('/assign-subject-form', [AssignSubjectController::class, 'showassignsubjectform'])->name('show.assign.subject.form');

//trash Student
Route::get('/student-trash{id}', [AdmissionController::class, 'studenttrash'])->name('student-trash');
Route::get('/trash-student-show', [AdmissionController::class, 'trashstudentshow'])->name('trash-student-show');

//student Registration fee
Route::get('/registration-fee', [AdmissionController::class, 'registrationfee'])->name('registration-fee-show');


//logout
Route::get('/logout', [DashboardController::class, 'logout'])->name('user.logout');

});

Route::get('/login', [FrontendController::class, 'showloginform'])->name('show.login.form');
Route::post('/user-login', [FrontendController::class, 'userlogin'])->name('user.login');

Route::get('/result', [FrontendController::class, 'resultsearchpage'])->name('result.search.form');
Route::get('/search-result', [FrontendController::class, 'resultsearch'])->name('result.search');
Route::get('/', [FrontendController::class, 'homepage'])->name('home.page');
