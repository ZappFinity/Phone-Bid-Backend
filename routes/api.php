<?php

use App\Http\Controllers\Blog\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Comparison\ComparisonController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Mobile\NewMobileController;
use App\Http\Controllers\Mobile\UsedMobileController;


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
 * Comparison Routes
 */
Route::controller(ComparisonController::class)->group(function () {
    Route::prefix('comparison')->group(function () {
        Route::get('/list', [ComparisonController::class, 'index']);
        Route::get('/show/{id}', [ComparisonController::class, 'show']);
    });
});

/**
 * Mobile Routes
 */
Route::prefix('mobile')->group(function () {
    Route::get('/new', [NewMobileController::class, 'index']);
    Route::get('/new/show/{id}', [NewMobileController::class, 'show']);
    Route::get('/used', [UsedMobileController::class, 'index']);
    Route::get('/used/show/{id}', [UsedMobileController::class, 'show']);
});
/**
 * Default Route
 */

//change password
Route::post('/changepassword', [ChangePasswordController::class, 'changePassword']);
//forgotpassword
Route::post('/sendresetlink', [ChangePasswordController::class, 'forgotPassword'])->name('password.reset');;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
