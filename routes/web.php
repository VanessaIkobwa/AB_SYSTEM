<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcademicAdminController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AppointmentController;



use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');


//student
Route::group(['middleware' => 'student'],function()
{
    Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'student']) //role == 0
    ->name('dashboard');

    Route::get('/my/appointments',[StudentController::class,'loadMyAppointments'])
    ->name('my-appointments');

    Route::get('/booking/page/{lecturer_id}',[StudentController::class,'loadBookingPage']);
    Route::get('/all/lecturers',[StudentController::class,'loadAllLecturers'])
    ->name('all-lecturers');

      //   Reschedule
      Route::get('/student/reschedule/{appointment_id}',[StudentController::class,'loadReschedulingForm']);

      //cancelation reason

      Route::get('/student/reason/{appointment_id}',[StudentController::class,'loadReasonForm'])
      ->name('student-reason-form');

      //booking reason

      Route::get('/student/bookingreason/{appointment_id}',[StudentController::class,'loadBookingReasonForm'])
      ->name('student-bookingreason-form');




});

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/filter-by-unit/{unit_id}',[StudentController::class,'loadLecturerByUnit']);


//lecturer
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

      //   Reschedule
      Route::get('/lecturer/reschedule/{appointment_id}',[LecturerController::class,'loadReschedulingForm']);
    
   
      //cancelation reason
      Route::get('/lecturer/reason/{appointment_id}',[LecturerController::class,'loadReasonForm'])
      ->name('lecturer-reason-form');

    
});

//admin
Route::group(['middleware' => 'admin'],function()
{
    Route::get('/admin/dashboard',[AdminController::class,'loadAdminDashboard'])
    ->name('admin-dashboard');

    Route::get('/admin/lecturers',[AdminController::class,'loadLecturerListing'])
    ->name('admin-lecturers');
    
    Route::get('/admin/create/lecturer',[AdminController::class,'loadLecturerForm']);

    //units
    Route::get('/admin/units',[AdminController::class,'loadAllUnits'])
    ->name('admin-units');

    Route::get('/admin/create/unit',[AdminController::class,'loadUnitForm']);
    Route::get('/edit/unit/{unit}',[AdminController::class,'loadEditUnitForm']);

    //Appointments
    Route::get('/admin/appointments',[AdminController::class,'loadAllAppointments'])
    ->name('admin-appointments');

    
    
});


//academic admin
Route::group(['middleware' => 'academic_admin'],function()
{
    Route::get('/academic_admin/dashboard',[AcademicAdminController::class,'loadAcademicAdminDashboard'])
    ->name('academic_admin-dashboard');

    //reports
    Route::get('/academic_admin/reports',[AcademicAdminController::class,'loadAllReports'])
    ->name('academic_admin-reports');

   //Appointments
    Route::get('/academic_admin/appointments',[AcademicAdminController::class,'loadAllAppointments'])
    ->name('academic_admin-appointments');

   //   Reschedule
    Route::get('/academic_admin/reschedule/{appointment_id}',[AcademicAdminController::class,'loadReschedulingForm']);

    //PDF
    Route::get('/academic_admin/reports/pdf',[AcademicAdminController::class,'loadPDFForm']);
    
});

Route::get('/appointments-data', [AppointmentController::class, 'getAppointmentsData']); 

require __DIR__.'/auth.php';
