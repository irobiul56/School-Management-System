<?php

use App\Http\Controllers\Admin\AdmissionController;
use App\Http\Controllers\Admin\StudentClassController;
use App\Http\Controllers\Admin\StudentFeeAmount;
use App\Http\Controllers\Admin\StudentFeeCategory;
use App\Http\Controllers\Admin\StudentGroupController;
use App\Http\Controllers\Admin\StudentShiftController;
use App\Http\Controllers\Admin\Studentyear;
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

Route::get('/admin-dashboard', function () {
    return view('admin.pages.dashboard');
});

Route::resource('/admission', AdmissionController::class);
Route::resource('/student-class', StudentClassController::class);
Route::resource('/student-year', Studentyear::class);
Route::resource('/student-group', StudentGroupController::class);
Route::resource('/student-shift', StudentShiftController::class);
Route::resource('/student-fee-category', StudentFeeCategory::class);
Route::resource('/student-fee-amount', StudentFeeAmount::class);
Route::get('/student-form', [AdmissionController::class, 'showstudentform'])->name('show.student.form');
Route::get('/student-fee-amount-form', [StudentFeeAmount::class, 'addfee'])->name('show.fee.add.form');
