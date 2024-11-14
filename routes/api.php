<?php

use App\Http\Controllers\ForgotPasswordController;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Uri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/sign_up', [apiController::class, 'sign_up']);
Route::post('/logout', [apiController::class, 'logout']);
Route::match(['get', 'post'], '/sign_in', [apiController::class, 'sign_in']);
Route::post('/forgot_password', [apiController::class, 'forgot_password']);
Route::post('/reset_password', [apiController::class, 'reset_password']);
Route::post('/upgradeToSeller', [apiController::class, 'upgradeToSeller']);
Route::post('/updateStatus', [apiController::class, 'updateStatus']);
Route::post('/tambahProduk', [apiController::class, 'tambahProduk'])->middleware('auth:api');
