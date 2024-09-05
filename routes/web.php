<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForgotController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\OperatorController;
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
Route::get('/about', [LandingController::class, 'about'])->name('about');
Route::get('/features', [LandingController::class, 'features'])->name('features');
Route::get('/contact', [LandingController::class, 'contact'])->name('contact');
Route::get('/galery', [LandingController::class, 'galery'])->name('galery');

Route::get('/login', [LoginController::class, 'Login'])->name('Login');
Route::get('/Forgot', [ForgotController::class, 'Forgot'])->name('Forgot');

Route::get('/Home', [AdminController::class, 'dashboard'])->name('Dashboard');
Route::get('/Pedagang', [AdminController::class, 'pedagang'])->name('Pedagang');
Route::get('/Keluhan', [AdminController::class, 'keluhan'])->name('Keluhan');


Route::get('/Mitra', [MitraController::class, 'mitra'])->name('Mitra');
Route::get('/Tambah-Mitra', [MitraController::class, 'tambahmitra'])->name('Tambah-Pesanan');
Route::post('/tambah', [MitraController::class, 'store'])->name('tambahan');;
Route::delete('/mitras/{id}', [MitraController::class, 'destroy'])->name('mitras.destroy');

Route::get('/Pendapatan', [AdminController::class, 'pendapatan'])->name('Pendapatan');
Route::get('/Profileadmin', [AdminController::class, 'profile'])->name('Profile');

Route::get('/DataAdmin', [AdminController::class, 'dataadmin'])->name('DataAdmin');
Route::get('/Tambahadmin', [AdminController::class, 'tambahadmin'])->name('Tambahadmin');


Route::get('/DashboardOperator', [OperatorController::class, 'DashboardOperator'])->name('DashboardOperator');
Route::get('/PedagangOperator', [OperatorController::class, 'PedagangOperator'])->name('PedagangOperator');
Route::get('/KeluhanOperator', [OperatorController::class, 'KeluhanOperator'])->name('KeluhanOperator');
Route::get('/ProfileOperator', [OperatorController::class, 'ProfileOperator'])->name('ProfileOperator');
