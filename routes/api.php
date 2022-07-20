<?php

use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\ApiForgetPasswordController;
use App\Http\Controllers\API\ApiBookingController;
use App\Http\Controllers\API\ApiContactController;
use App\Http\Controllers\API\ApiGetController;
use App\Http\Controllers\API\ApiProductController;
use App\Http\Controllers\API\ApiReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('renter', [ApiGetController::class, 'index']);

Route::get('services', [ApiGetController::class, 'index']);

Route::get('contact', [ApiContactController::class, 'index']);
Route::post('contact', [ApiContactController::class, 'store']);

Route::get('review', [ApiReviewController::class, 'index']);

Route::get('products', [ApiProductController::class, 'index']);
Route::get('products/{id}/delete', [ApiProductController::class, 'destroy']);
Route::post('products/{id}', [ApiProductController::class, 'update']);

// Route::get('bookings', [ApiBookingController::class, 'index']);
// Route::post('bookings', [ApiBookingController::class, 'store']);

Route::get('auth_user', [ApiAuthController::class, 'auth_user']);
Route::post('login', [ApiAuthController::class, 'login']);
Route::post('register', [ApiAuthController::class, 'register']);
Route::post('forgot-password', [ApiForgetPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [ApiForgetPasswordController::class, 'reset_password']);

Route::middleware('auth:sanctum', 'verified')->group(function () {

    // storing using token for service provider id

    Route::post('products', [ApiProductController::class, 'store']);
    // Route::post('products/{id}', [ApiProductController::class, 'update']);

    // storing using token for renter id
    Route::post('review', [ApiReviewController::class, 'store']);

    Route::post('logout', [ApiAuthController::class, 'logout']);
});
