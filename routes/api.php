<?php

use App\Http\Controllers\Blog\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

Route::post('/register', [RegisterController::class, 'register']);
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout']);

/**
 * Blog Routes
 */
Route::controller(BlogController::class)->group(function () {
    Route::prefix('blog')->group(function () {
        Route::get('/list', [BlogController::class, 'index']);
        Route::get('/show/{id}', [BlogController::class, 'show']);
    });
});
/** 
 * Default Route
 */
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});