<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::controller(\App\Http\Controllers\AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});



Route::controller(\App\Http\Controllers\NewsController::class)->group(function () {
    Route::get('news', 'index');
    Route::middleware('auth:api')->group(function () {
        Route::post('news', 'store');
        Route::get('news/{id}', 'show');
        Route::put('news/{id}', 'update');
        Route::delete('news/{id}', 'destroy');
    });
});
