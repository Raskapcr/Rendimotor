<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BengkelController;
use App\Http\Controllers\Controller2;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PegawaiController;

/*
|--------------------------------------------------------------------------
| 1. Route Autentikasi
|--------------------------------------------------------------------------
*/
Route::get('/', [AuthController::class, 'showLogin'])->name('hal-login');
Route::get('/auth', [AuthController::class, 'showLogin']);
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/forgot', [AuthController::class, 'show_forgot_password'])->name('auth.forgot');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/redirect-google', [AuthController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/oauthcallback', [AuthController::class, 'handleGoogleCallback']);

/*
|--------------------------------------------------------------------------
| 2. Route Public / Home
|--------------------------------------------------------------------------
*/
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('service', [HomeController::class, 'show_service'])->name('service');
Route::get('sparepart', [HomeController::class, 'show_sparepart'])->name('sparepart');
Route::get('about', [HomeController::class, 'show_about'])->name('about');

// Registrasi Bengkel
Route::get('/registrasi', [BengkelController::class, 'showRegister'])->name('register.bengkel');
Route::post('/register', [BengkelController::class, 'register'])->name('register');
Route::post('bengkel/store', [BengkelController::class, 'storeRegis'])->name('storeRegis');

/*
|--------------------------------------------------------------------------
| 3. Route Testing & Utility
|--------------------------------------------------------------------------
*/
Route::get('/now', function () {
    return 'Tanggal hari ini: ' . now('Asia/Jakarta')->format('d-m-Y H:i:s');
});

Route::get('/info', function () {
    phpinfo();
});

Route::get('/calculate/{param1}/{param2}', function ($param1, $param2) {
    if ($param1 == 0 && $param2 == 0) return "Silahkan masuk parameter";
    if ($param1 == 0) return $param2;
    if ($param2 == 0) return $param1;
    return $param1 * $param2;
});

// Route Controller 2
Route::get('/lulu', [Controller2::class, 'welcome']);
Route::get('/harini', [Controller2::class, 'currentTime']);
Route::get('/hitung/{param1}/{param2}', [Controller2::class, 'handleParams']);

/*
|--------------------------------------------------------------------------
| 4. Route Terproteksi (Middleware)
|--------------------------------------------------------------------------
*/
Route::middleware(['checkislogin'])->group(function () {

    // Pegawai
    Route::controller(PegawaiController::class)->group(function () {
        Route::get('/pegawai/index', 'index');
        Route::get('/pegawai/store/{param1}/{param2}', 'store');
        Route::get('/pegawai/show/{id}', 'show');
        Route::get('/pegawai/edit/{param1}', 'edit');
        Route::get('/pegawai/destroy/{param1}', 'destroy');
    });

    // Mitra
    Route::controller(MitraController::class)->group(function () {
        Route::get('mitra', 'index')->name('mitra.list');
        Route::get('mitra/create', 'create')->name('mitra.create');
        Route::post('mitra/store', 'store')->name('mitra.store');
        Route::get('mitra/edit/{param1}', 'edit')->name('mitra.edit');
        Route::post('mitra/update', 'update')->name('mitra.update');
        Route::get('mitra/destroy/{param1}', 'destroy')->name('mitra.destroy');
    });

    // Pelanggan
    Route::controller(PelangganController::class)->group(function () {
        Route::get('pelanggan', 'index')->name('pelanggan.list');
        Route::get('pelanggan/create', 'create')->name('pelanggan.create');
        Route::post('pelanggan/store', 'store')->name('pelanggan.store');
        Route::get('pelanggan/edit/{param1}', 'edit')->name('pelanggan.edit');
        Route::post('pelanggan/update', 'update')->name('pelanggan.update');
        Route::get('pelanggan/destroy/{param1}', 'destroy')->name('pelanggan.destroy');
    });

    // User
    Route::controller(UserController::class)->group(function () {
        Route::get('user', 'index')->name('user.list');
        Route::get('user/create', 'create')->name('user.create');
        Route::post('user/store', 'store')->name('user.store');
        Route::get('user/edit/{param1}', 'edit')->name('user.edit');
        Route::post('user/update', 'update')->name('user.update');
        Route::get('user/destroy/{param1}', 'destroy')->name('user.destroy');
    });

    // Product
    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index')->name('product.list');
        Route::get('product/create', 'create')->name('product.create');
        Route::post('product/store', 'store')->name('product.store');
        Route::get('product/edit/{param1}', 'edit')->name('product.edit');
        Route::post('product/update', 'update')->name('product.update');
        Route::get('product/destroy/{param1}', 'destroy')->name('product.destroy');
    });

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});
