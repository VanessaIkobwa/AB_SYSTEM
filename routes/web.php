<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AcademicAdminController;
use App\Http\Controllers\LecturerController;

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'student']) //0
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/lecturer/dashboard',[LecturerController::class,'loadLecturerDashboard'])
    ->name('lecturer-dashboard')
    ->middleware('lecturer');

Route::get('/admin/dashboard',[AdminController::class,'loadAdminDashboard'])
    ->name('admin-dashboard')
    ->middleware('admin');

Route::get('/academic_admin/dashboard',[AcademicAdminController::class,'loadAcademicAdminDashboard'])
    ->name('academic_admin-dashboard')
    ->middleware('academic_admin');

require __DIR__.'/auth.php';
