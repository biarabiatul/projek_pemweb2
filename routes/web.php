<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenggunaController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/pengguna', [PenggunaController::class, 'show'])->name('pengguna');

Route::group(['middleware' => ['auth']], function(){
    Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

});
