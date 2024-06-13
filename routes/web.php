<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/pengguna', [PenggunaController::class, 'show'])->name('pengguna');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'show'])->name('admin');
    Route::get('/adminalat', [AdminController::class, 'showalat'])->name('adminalat');
    Route::get('/admintempat', [AdminController::class, 'showtempat'])->name('admintempat');
    Route::get('/dataruangan', [AdminController::class, 'dataruangan'])->name('dataruangan');
    Route::get('/dataalat', [AdminController::class, 'dataalat'])->name('dataalat');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
    // Route::get('/admin-alat', [AdminController::class, 'show'])->name('admin-alat');

    Route::get('logout-user', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout-user');
    Route::get('logout-user', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout-user');

    Route::get('logout-user', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout-user');

});

Route::get('/penggunaruangan', [RuanganController::class, 'show'])->name('ruangan.show');
Route::get('/formPinjamRuangan', [RuanganController::class, 'showForm'])->name('form.ruangan');



