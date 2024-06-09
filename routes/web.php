<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PenggunaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/pengguna', [PenggunaController::class, 'show'])->name('pengguna');
Route::get('/admin', [AdminController::class, 'show'])->name('admin');
Route::get('/adminalat', [AdminController::class, 'showalat'])->name('adminalat');
Route::get('/admintempat', [AdminController::class, 'showtempat'])->name('admintempat');
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

    

