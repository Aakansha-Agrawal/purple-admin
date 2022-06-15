<?php

use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/bookings', [HomeController::class, 'booking']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/renter', [HomeController::class, 'renter']);
Route::get('/reviews', [HomeController::class, 'review']);
Route::get('/services', [HomeController::class, 'service']);
Route::get('/payments/renter', [HomeController::class, 'payment_renter']);
Route::get('/payments/provider', [HomeController::class, 'payment_provider']);

Route::get('/login', [HomeController::class, 'login']);
