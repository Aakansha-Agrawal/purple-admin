<?php

use App\Http\Controllers\API\APiContactController;
use App\Http\Controllers\API\APiProductController;
use App\Http\Controllers\API\ApiRenterController;
use App\Http\Controllers\API\APiReviewController;
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

Route::get('contact',[APiContactController::class, 'index']);
Route::post('contact',[APiContactController::class, 'store']);

Route::get('review',[APiReviewController::class, 'index']);
Route::post('review',[APiReviewController::class, 'store']);

Route::get('products',[APiProductController::class, 'index']);
Route::post('products',[APiProductController::class, 'store']);


