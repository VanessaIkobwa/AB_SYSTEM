<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcademicAdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;


use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');



Route::group(['middleware' => 'student'],function()
{
    Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'student']) //role == 0
    ->name('dashboard');

    Route::get('/my/appointments',[StudentController::class,'loadMyAppointments'])
    ->name('my-appointments');

    Route::get('/booking/page/{lecturer_id}',[StudentController::class,'loadBookingPage']);
});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/filter-by-unit/{unit_id}',[StudentController::class,'loadLecturerByUnit']);



Route::group(['middleware' => 'lecturer'],function()
{
    Route::get('/lecturer/dashboard',[LecturerController::class,'loadLecturerDashboard'])
    ->name('lecturer-dashboard');

    Route::get('/lecturer/appointments',[LecturerController::class,'loadAllAppointments'])
    ->name('lecturer-appointments');

    Route::get('/lecturer/schedules',[LecturerController::class,'loadAllSchedules'])
    ->name('my-schedules');
    
    Route::get('/create/schedule',[LecturerController::class,'loadAddScheduleForm']);
    Route::get('/edit/schedule/{schedule_id}',[LecturerController::class,'loadEditScheduleForm']);

    
   
});


Route::group(['middleware' => 'admin'],function()
{
    Route::get('/admin/dashboard',[AdminController::class,'loadAdminDashboard'])
    ->name('admin-dashboard');

    Route::get('/admin/lecturers',[AdminController::class,'loadLecturerListing'])
    ->name('admin-lecturers');
    
    Route::get('/admin/create/lecturer',[AdminController::class,'loadLecturerForm']);

    Route::get('/admin/units',[AdminController::class,'loadAllUnits'])
    ->name('admin-units');

    Route::get('/admin/create/unit',[AdminController::class,'loadUnitForm']);
    Route::get('/edit/unit/{unit}',[AdminController::class,'loadEditUnitForm']);


    
});




Route::get('/academic_admin/dashboard',[AcademicAdminController::class,'loadAcademicAdminDashboard'])
    ->name('academic_admin-dashboard')
    ->middleware('academic_admin');

require __DIR__.'/auth.php';
