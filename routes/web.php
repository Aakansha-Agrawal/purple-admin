<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::get('/contact', [HomeController::class, 'contact']);
    Route::get('/reviews', [HomeController::class, 'review']);
    Route::get('/payments/end-user', [HomeController::class, 'payment_renter']);
    Route::get('/payments/provider', [HomeController::class, 'payment_provider']);
    Route::get('/viewdetails', [HomeController::class, 'viewdetails']);

    // --------- products routes ---------- //
    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{id}/view', [ProductController::class, 'show']);
    Route::get('/products/{id}/delete', [ProductController::class, 'destroy']);
    Route::get('/products/{id}/restore', [ProductController::class, 'restore']);
    Route::get('/products/trash', [ProductController::class, 'deleted_data']);
    Route::get('/products/approved', [ProductController::class, 'approve']);
    Route::get('/{file}/download', [ProductController::class, 'download']);
    Route::get('/changeStatus', [ProductController::class, 'changeStatus']);

    // --------- services routes ---------- //
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{id}/delete', [ServiceController::class, 'destroy']);
    Route::get('/services/{id}/restore', [ServiceController::class, 'restore']);
    Route::get('/services/trash', [ServiceController::class, 'deleted_data']);

    // --------- End User routes ---------- //
    Route::get('/end-user', [RenterController::class, 'index']);
    Route::get('/end-user/{id}/delete', [RenterController::class, 'destroy']);
    Route::get('/end-user/{id}/restore', [RenterController::class, 'restore']);
    Route::get('/end-user/trash', [RenterController::class, 'deleted_data']);

    // --------- bookings routes ---------- //
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::get('/bookings/closed', [BookingController::class, 'closed']);
    Route::get('/bookings/{id}/view', [BookingController::class, 'show']);
    Route::get('/bookings/{id}/delete', [BookingController::class, 'destroy']);

    // -------- Category routes ----------- //
    Route::get('/category', [CategoryController::class, 'index']);
    Route::get('/category/add', [CategoryController::class, 'create']);
    Route::post('/category/store', [CategoryController::class, 'store']);
    Route::get('/category/{id}/delete', [CategoryController::class, 'destroy']);

    Route::get('/change-password/{id}', [ChangePasswordController::class, 'change_password']);
    Route::post('/update-password/{id}', [ChangePasswordController::class, 'update_password']);
});

Auth::routes();
