<?php

use App\Http\Controllers\API\ApiBookingController;
use App\Http\Controllers\API\ApiContactController;
use App\Http\Controllers\API\ApiProductController;
use App\Http\Controllers\API\ApiRenterController;
use App\Http\Controllers\API\ApiReviewController;
use App\Http\Controllers\API\ApiServiceController;
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

Route::get('renter',[ApiRenterController::class, 'index']);
Route::post('renter',[ApiRenterController::class, 'store']);

Route::get('services',[ApiServiceController::class, 'index']);
Route::post('services',[ApiServiceController::class, 'store']);

Route::get('contact',[ApiContactController::class, 'index']);
Route::post('contact',[ApiContactController::class, 'store']);

Route::get('review',[ApiReviewController::class, 'index']);
Route::post('review',[ApiReviewController::class, 'store']);

Route::get('products',[ApiProductController::class, 'index']);
Route::post('products',[ApiProductController::class, 'store']);

Route::get('bookings',[ApiBookingController::class, 'index']);
Route::post('bookings',[ApiBookingController::class, 'store']);


