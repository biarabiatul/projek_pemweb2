<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanRuanganController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'show'])->name('about');
Route::get('/penggunaruangan', [RuanganController::class, 'showPengguna'])->name('ruangan.showPengguna');
Route::get('/tutorial', [TutorialController::class, 'show'])->name('tutorial');

Route::get('/dataruangan', [RuanganController::class, 'showAdmin'])->name('ruangan.showAdmin');
Route::get('/formPinjamRuangan', [RuanganController::class, 'showForm'])->name('ruangan.showForm');
Route::post('/admin/dataruangan', [RuanganController::class, 'store'])->name('ruangan.store');
Route::delete('/admin/ruangan/delete', [RuanganController::class, 'delete'])->name('ruangan.delete');
Route::get('/admin/dataruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
Route::put('/admin/dataruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');


Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('login.logout');
    Route::get('/pengguna', [PenggunaController::class, 'show'])->name('pengguna');
    Route::get('/peminjaman-saya', [PeminjamanRuanganController::class, 'index'])->name('peminjamanSaya.index');
    Route::get('/form-peminjaman', [PeminjamanRuanganController::class, 'create'])->name('peminjaman.create');
    Route::post('/form-peminjaman', [PeminjamanRuanganController::class, 'store'])->name('peminjaman.store');
});

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminalat', [AdminController::class, 'showalat'])->name('adminalat');
    Route::get('/admintempat', [AdminController::class, 'showtempat'])->name('admintempat');
    // Route::get('/dataruangan', [AdminController::class, 'dataruangan'])->name('dataruangan');
    Route::get('/dataalat', [AdminController::class, 'dataalat'])->name('dataalat');
    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
});


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