<?php

use App\Http\Controllers\Accessories\AccessoriesController;
use App\Http\Controllers\Bid\BidController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\MobileRepairing\MobileRepairingController;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::post('mobile/used/store', [UsedMobileController::class, 'store']);
});

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
    //delete 
    Route::get('/destroy/{id}', [UsedMobileController::class, 'destroy']);
});
/**
 * Accessories Routes
 */
Route::prefix('accessories')->group(function () {
    Route::get('/list', [AccessoriesController::class, 'index']);
    Route::get('/show/{id}', [AccessoriesController::class, 'show']);
});
/**
 * Bid Routes
 */
Route::prefix('bid')->group(function () {
    Route::get('/mobile/list', [BidController::class, 'index']);
    Route::get('/mobile/{id}', [BidController::class, 'show']);
    Route::post('/place/{id}', [BidController::class, 'placeBid']);
});
Route::middleware('auth:sanctum')->prefix('bid')->group(function () {
    Route::post('/users_mobile', [BidController::class, 'getLoggedInUsersMobilesForBids']);
});

/**
 * Mobile Repairing Routes
 */
Route::middleware('auth:sanctum')->prefix('mobile-repairing')->group(function () {
    Route::post('/store', [MobileRepairingController::class, 'store']);
    Route::get('/get', [MobileRepairingController::class, 'index']);
});

/**
 * Default Route
 */

//change password
Route::post('/changepassword', [ChangePasswordController::class, 'changePassword']);
//forgotpassword
Route::post('/sendresetlink', [ChangePasswordController::class, 'forgotPassword'])->name('password.reset');
;
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
