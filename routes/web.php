<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AttendanceController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Event;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('events', EventController::class);

    // Attendance Routes
    Route::get('/events/{event}/attendance', [AttendanceController::class, 'showAttendance'])->name('events.attendance');
    Route::post('/events/{event}/attendance', [AttendanceController::class, 'recordAttendance'])->name('events.recordAttendance');
    Route::get('/events/{event}/qrcode', [AttendanceController::class, 'generateQRCode'])->name('events.qrcode');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance.index');

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('role');

});
