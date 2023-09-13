<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\ApplyController;
use App\Http\Controllers\Admin\AssignSubjectController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\CategoryPostController;
use App\Http\Controllers\Admin\ChairmanMessage;
use App\Http\Controllers\Admin\ClassRoutineController;
use App\Http\Controllers\Admin\ClasswiseResultsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DefaultController;
use App\Http\Controllers\Admin\DesignationController;
use App\Http\Controllers\Admin\Employee;
use App\Http\Controllers\Admin\ExamTypeController;
use App\Http\Controllers\Admin\FinalExamResult;
use App\Http\Controllers\Admin\FinalExamResultController;
use App\Http\Controllers\Admin\governingBody;
use App\Http\Controllers\Admin\GradepointController;
use App\Http\Controllers\Admin\MarksController;
use App\Http\Controllers\Admin\MonthlyExamController;
use App\Http\Controllers\Admin\Notice;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController as AdminSliderController;
use App\Http\Controllers\Admin\StudentClassController;
use App\Http\Controllers\Admin\StudentFeeAmount;
use App\Http\Controllers\Admin\StudentFeeCategory;
use App\Http\Controllers\Admin\StudentGroupController;
use App\Http\Controllers\Admin\StudentShiftController;
use App\Http\Controllers\Admin\Studentyear;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TagPostController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TutorialExamController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\SliderController;
use App\Models\Apply;
use App\Models\ClassRoutineModel;
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

//Slider Routes
Route::resource('/slider', AdminSliderController::class);
Route::get('/slider-status-update/{id}', [AdminSliderController::class, 'sliderStatus'])->name('slider.status.update');
Route::get('/slider-trash-update/{id}', [AdminSliderController::class, 'slideTrash'])->name('slide.trash');
Route::get('/trash-slider', [AdminSliderController::class, 'showTrashSlider'])->name('show.trash.slider');

//Home Page About Route
Route::resource('/about', AboutController::class);
Route::get('/about-status-update/{id}', [AboutController::class, 'aboutStatus'])->name('about.status.update');
Route::get('/about-trash-update/{id}', [AboutController::class, 'aboutTrash'])->name('about.trash');
Route::get('/trash-about', [AboutController::class, 'showTrashAbout'])->name('show.trash.about');

//Notice Route
Route::resource('/notice', Notice::class);
Route::get('/notice-status-update/{id}', [Notice::class, 'noticeStatus'])->name('notice.status.update');
Route::get('/notice-trash-update/{id}', [Notice::class, 'noticeTrash'])->name('notice.trash');
Route::get('/trash-notice', [Notice::class, 'showTrashNotice'])->name('show.trash.notice');

//Notice Route
Route::resource('/apply', ApplyController::class);
Route::get('/apply-status-update/{id}', [ApplyController::class, 'applyStatus'])->name('apply.status.update');
Route::get('/apply-trash-update/{id}', [ApplyController::class, 'applyTrash'])->name('apply.trash');
Route::get('/trash-apply', [ApplyController::class, 'showTrashApply'])->name('show.trash.apply');

//Testimonial Route
Route::resource('/testimonial', TestimonialController::class);
Route::get('/testimonial-status-update/{id}', [TestimonialController::class, 'testimonialStatus'])->name('testimonial.status.update');
Route::get('/testimonial-trash-update/{id}', [TestimonialController::class, 'testimonialTrash'])->name('testimonial.trash');
Route::get('/trash-testimonial', [TestimonialController::class, 'showTrashTestimonial'])->name('show.trash.testimonial');

//Tag post Route
Route::resource('/tag', TagPostController::class);
Route::get('/tag-status-update/{id}', [TagPostController::class, 'tagStatus'])->name('tag.status.update');
Route::get('/tag-trash-update/{id}', [TagPostController::class, 'tagTrash'])->name('tag.trash');
Route::get('/trash-tag', [TagPostController::class, 'showTrashTag'])->name('show.trash.tag');

//Category post Route
Route::resource('/category', CategoryPostController::class);
Route::get('/category-status-update/{id}', [CategoryPostController::class, 'categoryStatus'])->name('category.status.update');
Route::get('/category-trash-update/{id}', [CategoryPostController::class, 'categoryTrash'])->name('category.trash');
Route::get('/trash-category', [CategoryPostController::class, 'showTrashCategory'])->name('show.trash.category');

//Blog post Route
Route::resource('/post', BlogPostController::class);
Route::get('/allpost', [BlogPostController::class, 'showAllPost'])->name('show.all.post');
Route::get('/blogpost-status-update/{id}', [BlogPostController::class, 'blogpostStatus'])->name('blogpost.status.update');
Route::get('/blogpost-trash-update/{id}', [BlogPostController::class, 'blogpostTrash'])->name('blogpost.trash');
Route::get('/trash-blogpost', [BlogPostController::class, 'showTrashbBogpost'])->name('show.trash.blogpost');

//Administration route

//governing body
Route::resource('/governing-body', governingBody::class);
Route::get('/governing-status-update/{id}', [governingBody::class, 'governingStatus'])->name('governing.status.update');

//Chairman Message
Route::resource('/chairman-message', ChairmanMessage::class);
Route::get('/chairman-message-status-update/{id}', [ChairmanMessage::class, 'chairmanStatus'])->name('chairman.status.update');
Route::get('/chairman-message-trash-update/{id}', [ChairmanMessage::class, 'chairmanTrash'])->name('chairman.trash');

//Class Routine
Route::resource('/class-routine', ClassRoutineController::class);
Route::get('/create-routine', [ClassRoutineController::class, 'createRoutine'])->name('show.all.routine');


});


Route::get('/login', [FrontendController::class, 'showloginform'])->name('show.login.form');
Route::post('/user-login', [FrontendController::class, 'userlogin'])->name('user.login');

Route::get('/result', [FrontendController::class, 'resultsearchpage'])->name('result.search.form');
Route::get('/search-result', [FrontendController::class, 'resultsearch'])->name('result.search');
Route::get('/', [FrontendController::class, 'homepage'])->name('home.page');

//notice route
Route::get('/notice-board', [Notice::class, 'allnotice'])->name('all.notice');
Route::get('/single-blog-post{id}', [BlogPostController::class, 'singleBlogPost'])->name('single.blog.post');
Route::get('/single-notice{id}', [Notice::class, 'singleNotice'])->name('single.notice');
Route::get('/about-us', [AboutUsController::class, 'aboutUs'])->name('single.about');
Route::get('/history', [AboutUsController::class, 'history'])->name('single.history');
Route::get('/mission-and-vision', [AboutUsController::class, 'missionAndVision'])->name('mission.page');
Route::get('/news-and-event', [AboutUsController::class, 'newsAndEvent'])->name('news.event.page');
Route::get('/achievement', [AboutUsController::class, 'newsAndEvent'])->name('achievement.page');
Route::get('/teacher-staff', [FrontendController::class, 'teacherStaff'])->name('teacher.staff');
Route::get('/governing-staff', [FrontendController::class, 'governingBodyStaff'])->name('govrning.body.staff');
Route::get('/chairman-messages', [ChairmanMessage::class, 'chairmanmessages'])->name('chairman.messages-show');
Route::get('/book-list', [FrontendController::class, 'bookList'])->name('show.book.list');









//Not Found Router
Route::get('/{pathMatch}', function () {
    return view('frontend.layouts.notfound');
}) -> where('pathMatch', ".*");


