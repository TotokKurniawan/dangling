<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'home'])->name('home');
Route::get('/fitur', [LandingController::class, 'fitur'])->name('fitur');

Route::get('/login', [LoginController::class, 'Login'])->name('Login');
Route::get('/Forgot', [ForgotController::class, 'Forgot'])->name('Forgot');

Route::get('/Home', [AdminController::class, 'dashboard'])->name('Dashboard');
Route::get('/Pedagang', [AdminController::class, 'pedagang'])->name('Pedagang');
Route::get('/Keluhan', [AdminController::class, 'keluhan'])->name('Keluhan');


Route::get('/Mitra', [MitraController::class, 'mitra'])->name('Mitra');
Route::get('/Tambah-Mitra', [MitraController::class, 'tambahmitra'])->name('Tambah-Pesanan');
Route::delete('/mitras/{id}', [MitraController::class, 'destroy'])->name('mitras.destroy');


Route::post('/tambah', [MitraController::class, 'store'])->name('tambahan');;

Route::get('/Pendapatan', [AdminController::class, 'pendapatan'])->name('Pendapatan');
Route::get('/Profileadmin', [AdminController::class, 'profile'])->name('Profile');
