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
use App\Http\Controllers\PegawaiController; // Saya tambahkan ini agar tidak error

// 1. Halaman utama sekarang langsung ke Login
Route::get('/', [AuthController::class, 'showLogin'])->name('hal-login');

// Route Auth lainnya (Tetap ada atau bisa dihapus jika ingin pakai / saja)
Route::get('/auth', [AuthController::class, 'showLogin']);
Route::post('/auth/login', [AuthController::class, 'login'])->name('login');
Route::get('/auth/forgot', [AuthController::class, 'show_forgot_password'])->name('auth.forgot');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/auth/redirect-google', [AuthController::class, 'redirectToGoogle'])->name('redirect.google');
Route::get('/oauthcallback', [AuthController::class, 'handleGoogleCallback']);

// --- Route Info & Testing ---
Route::get('/now', function () {
    return 'Tanggal hari ini:' . now('Asia/Jakarta')->format('d-m-Y H:i:s');
});

Route::get('/info', function () {
    phpinfo();
});

Route::get('/calculate/{param1}/{param2}', function ($param1, $param2) {
    if ($param1 == 0 && $param2 == 0) {
        return "Silahkan masuk parameter";
    } elseif ($param1 == 0) {
        return $param2;
    } elseif ($param2 == 0) {
        return $param1;
    } else {
        return $param1 * $param2;
    }
});

// --- Route Controller 2 ---
Route::get('/lulu', [Controller2::class, 'welcome']);
Route::get('/harini', [Controller2::class, 'currentTime']);
Route::get('/hitung/{param1}/{param2}', [Controller2::class, 'handleParams']);

// --- Route Pegawai ---
Route::get('/pegawai/index', [PegawaiController::class, 'index']);
Route::get('/pegawai/store/{param1}/{param2}', [PegawaiController::class, 'store']);
Route::get('/pegawai/show/{id}', [PegawaiController::class, 'show']);
Route::get('/pegawai/edit/{param1}', [PegawaiController::class, 'edit']);
Route::get('/pegawai/destroy/{param1}', [PegawaiController::class, 'destroy']);

// --- Route Mitra ---
Route::get('mitra', [MitraController::class, 'index'])->name('mitra.list');
Route::get('mitra/create', [MitraController::class, 'create'])->name('mitra.create');
Route::post('mitra/store', [MitraController::class, 'store'])->name('mitra.store');
Route::get('mitra/edit/{param1}', [MitraController::class, 'edit'])->name('mitra.edit');
Route::post('mitra/update', [MitraController::class, 'update'])->name('mitra.update');
Route::get('mitra/destroy/{param1}', [MitraController::class, 'destroy'])->name('mitra.destroy');

// --- Route Group dengan Middleware ---
Route::group(['middleware' => ['checkislogin']], function () {

    Route::get('pelanggan', [PelangganController::class, 'index'])->name('pelanggan.list');
    Route::get('pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('pelanggan/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('pelanggan/edit/{param1}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::post('pelanggan/update', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::get('pelanggan/destroy/{param1}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');

    Route::get('user', [UserController::class, 'index'])->name('user.list');
    Route::get('user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('user/edit/{param1}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('user/update', [UserController::class, 'update'])->name('user.update');
    Route::get('user/destroy/{param1}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('product', [ProductController::class, 'index'])->name('product.list');
    Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('product/edit/{param1}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
    Route::get('product/destroy/{param1}', [ProductController::class, 'destroy'])->name('product.destroy');

    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

// --- Route Home/Landing Page ---
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('service', [HomeController::class, 'show_service'])->name('service');
Route::get('sparepart', [HomeController::class, 'show_sparepart'])->name('sparepart');
Route::get('about', [HomeController::class, 'show_about'])->name('about');

// --- Route Registrasi Bengkel ---
Route::get('/registrasi', [BengkelController::class, 'showRegister'])->name('register.bengkel');
Route::post('/register', [BengkelController::class, 'register'])->name('register');
Route::post('bengkel/store', [BengkelController::class, 'storeRegis'])->name('storeRegis');
