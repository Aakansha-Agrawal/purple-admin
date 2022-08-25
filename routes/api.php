<?php

use App\Http\Controllers\API\ApiAuthController;
use App\Http\Controllers\API\ApiForgetPasswordController;
use App\Http\Controllers\API\ApiBookingController;
use App\Http\Controllers\API\ApiContactController;
use App\Http\Controllers\API\ApiGetController;
use App\Http\Controllers\API\ApiPaymentController;
use App\Http\Controllers\API\ApiProductController;
use App\Http\Controllers\API\ApiReviewController;
use App\Http\Controllers\API\ApiSearchController;
use App\Http\Controllers\API\ApiCartController;
use App\Http\Controllers\BannerController;
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

Route::get('renter', [ApiGetController::class, 'renter']);

Route::get('services', [ApiGetController::class, 'service']);

Route::get('contact', [ApiContactController::class, 'index']);

Route::get('review', [ApiReviewController::class, 'index']);

Route::get('products', [ApiProductController::class, 'index']);
Route::get('products/{id}/delete', [ApiProductController::class, 'destroy']);
Route::post('products/{id}', [ApiProductController::class, 'update']);
Route::get('category/products', [ApiProductController::class, 'get_products']);
Route::get('category/{id}', [ApiProductController::class, 'category_products']);
Route::post('user_products', [ApiProductController::class, 'get_user_products']);

Route::get('bookings', [ApiBookingController::class, 'index']);
Route::post('bookings/{id}', [ApiBookingController::class, 'update']);

Route::get('payments', [ApiPaymentController::class, 'get_status']);
Route::post('payments/{id}', [ApiPaymentController::class, 'update_status']);

Route::get('auth_user', [ApiAuthController::class, 'auth_user']);
Route::post('login', [ApiAuthController::class, 'login']);
Route::post('register', [ApiAuthController::class, 'register']);
Route::post('forgot-password', [ApiForgetPasswordController::class, 'forgotPassword']);
Route::post('reset-password', [ApiForgetPasswordController::class, 'reset_password']);
Route::post('get_user', [ApiAuthController::class, 'get_user']);
Route::get('search/{name}', [ApiSearchController::class, 'filter']);

Route::get('/banners', [BannerController::class, 'api_index']);

Route::get('cart/{id}/delete', [ApiCartController::class, 'destroy']);

Route::middleware('auth:sanctum', 'verified')->group(function () {
    
    Route::get('cart', [ApiCartController::class, 'index']);
    Route::post('cart/store', [ApiCartController::class, 'store']);

    // storing using token for end user
    Route::post('bookings', [ApiBookingController::class, 'store']);

    // storing using token for service provider id
    Route::post('products', [ApiProductController::class, 'store']);
    Route::post('get_review', [ApiReviewController::class, 'get_review']);

    // storing using token for renter id
    Route::post('review', [ApiReviewController::class, 'store']);

    Route::post('logout', [ApiAuthController::class, 'logout']);
    Route::post('contact', [ApiContactController::class, 'store']);
});
