<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PengajuanSiswaController;

Route::get('/', function () {
    return redirect()->route('login');
});

// Route Login & Register
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Route Dashboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Route Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route untuk Ajukan Magang
    Route::get('/internship/ajukan', [InternshipController::class, 'create'])->name('internship.ajukan');
    Route::post('/internship/ajukan', [PengajuanSiswaController::class, 'store'])->name('internship.apply');

    // Route untuk Cek Status Magang
    Route::get('/internship/status', [InternshipController::class, 'status'])->name('internship.status');

    // Route untuk Unggah Laporan
    Route::get('/report/upload', [ReportController::class, 'showForm'])->name('report.form');
    Route::post('/report/upload', [ReportController::class, 'upload'])->name('report.upload');
    Route::post('/report/send/{id}', [ReportController::class, 'send'])->name('report.send');
    Route::delete('/report/delete/{id}', [ReportController::class, 'delete'])->name('report.delete');

});

Route::post('/internship/apply', [PengajuanSiswaController::class, 'store'])->name('internship.apply');

require __DIR__.'/auth.php';