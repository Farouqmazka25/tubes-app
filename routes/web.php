<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardAdminController;

// Halaman awal (optional)
Route::get('/', function () {
    return redirect()->route('login.form');
});

// Login & Register
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/keluar', [AuthController::class, 'logout'])->name('logout');


// ========================
// DASHBOARD
// ========================

// Admin dashboard (hanya view)
Route::get('/dashboardadmin', function () {
    return view('admin.dashboardadmin');
})->name('dashboardadmin');


// User dashboard controller
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboarduser', [DashboardUserController::class, 'index'])->name('dashboard.user');
});


// ========================
// CART
// ========================
Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{item}', [CartController::class, 'remove'])->name('cart.remove'); // Optional
});


// ========================
// ORDER / CHECKOUT
// ========================
Route::middleware(['auth'])->group(function () {
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
});

Route::get('/orders/{order}', [\App\Http\Controllers\OrderController::class, 'show'])->name('orders.show')->middleware('auth');
Route::get('/orders', [OrderController::class, 'index'])->name('orders.index')->middleware('auth');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show')->middleware('auth');   

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/cart/update/{item}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{item}', [CartController::class, 'destroy'])->name('cart.remove');
});
Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('dashboardadmin');
Route::middleware(['auth'])->prefix('dashboardadmin')->name('admin.')->group(function () {
    Route::resource('/products', \App\Http\Controllers\ProductController::class);
});



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('/products', ProductController::class);
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', App\Http\Controllers\ProductController::class);
});




Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
});
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminOrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
