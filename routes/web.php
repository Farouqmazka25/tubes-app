<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');

// Proses login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Logout
Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');

// Dashboard Admin
Route::get('/dashboardadmin', function () {
    return view('admin.dashboardadmin');
})->name('dashboardadmin');

// Dashboard User
Route::get('/dashboarduser', function () {
    return view('user.dashboarduser');
})->name('dashboarduser');
