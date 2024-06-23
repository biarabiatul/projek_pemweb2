<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TutorialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamanAlatController;
use App\Http\Controllers\PeminjamanSayaController;
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
    Route::get('/show-alat', [AlatController::class, 'showAlat'])->name('showAlat');


    // Route untuk menampilkan halaman peminjaman
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.saya');

    // Route untuk menampilkan form peminjaman alat
    Route::get('/peminjaman/alat/{id}', [PeminjamanController::class, 'showFormAlat'])->name('peminjaman.alat.form');

    // Route untuk menyimpan peminjaman alat
    Route::post('/peminjaman/alat', [PeminjamanController::class, 'storeAlat'])->name('peminjaman.alat.store');

    // Route untuk menampilkan form peminjaman ruangan
    Route::get('/peminjaman/ruangan/{id}', [PeminjamanController::class, 'showFormRuangan'])->name('peminjaman.ruangan.form');

    // Route untuk menyimpan peminjaman ruangan
    Route::post('/peminjaman/ruangan', [PeminjamanController::class, 'storeRuangan'])->name('peminjaman.ruangan.store');

});

Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');

// Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
//     Route::get('/adminalat', [AdminController::class, 'showalat'])->name('adminalat');
//     Route::get('/admintempat', [AdminController::class, 'showtempat'])->name('admintempat');
//     // Route::get('/dataruangan', [AdminController::class, 'dataruangan'])->name('dataruangan');
//     Route::get('/dataalat', [AdminController::class, 'dataalat'])->name('dataalat');
//     Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
//     Route::get('/admin/peminjaman', [PeminjamanRuanganController::class, 'adminIndex'])->name('admin.peminjaman.index');
//     Route::post('/admin/peminjaman/{id}/update-status', [PeminjamanRuanganController::class, 'updateStatus'])->name('admin.peminjaman.updateStatus');
// });

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/adminalat', [AdminController::class, 'showalat'])->name('adminalat');
    // Route::get('/admintempat', [AdminController::class, 'manajemenPeminjaman'])->name('admin.admintempat');

    Route::get('/dataruangan', [RuanganController::class, 'showAdmin'])->name('ruangan.showAdmin');
    
    Route::post('/admin/dataruangan', [RuanganController::class, 'store'])->name('ruangan.store');
    Route::delete('/admin/ruangan/delete', [RuanganController::class, 'delete'])->name('ruangan.delete');
    Route::get('/admin/dataruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
    Route::put('/admin/dataruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
   
    Route::post('/dataalat', [AlatController::class, 'store'])->name('alat.store');
    Route::delete('/dataalat/{id}', [AlatController::class, 'delete'])->name('alat.delete');
    Route::get('/dataalat/{id}/edit', [AlatController::class, 'edit'])->name('alat.edit');
    Route::put('/dataalat/{id}', [AlatController::class, 'update'])->name('alat.update');
    Route::get('/dataalat', [AlatController::class, 'showAdminalat'])->name('alat.showAdminalat');

    Route::get('/admintempat', [AdminController::class, 'manajemenPeminjamanRuangan'])->name('admin.admintempat');
    Route::post('/admin/peminjaman-ruangan/update-status/{id}', [AdminController::class, 'updateStatusRuangan'])->name('admin.peminjaman.ruangan.updateStatus');

    Route::get('/adminalat', [AdminController::class, 'manajemenPeminjamanAlat'])->name('admin.adminalat');
    Route::post('/admin/peminjaman-alat/update-status/{id}', [AdminController::class, 'updateStatusAlat'])->name('admin.peminjaman.alat.updateStatus');

    Route::get('/laporan', [AdminController::class, 'laporan'])->name('laporan');
    Route::get('/admin/peminjaman', [PeminjamanRuanganController::class, 'adminIndex'])->name('admin.peminjaman.index');
    Route::post('/admin/peminjaman/{id}/update-status', [PeminjamanRuanganController::class, 'updateStatus'])->name('admin.peminjaman.updateStatus');
    
    Route::get('/logout-admin', function(){
        Auth::logout();
        return redirect('/');
    })->name('logout-admin');
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
