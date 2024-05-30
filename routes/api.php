<?php

use App\Http\Controllers\api\BookingAndCustomerDetailAPIController;
use App\Http\Controllers\api\VehicleAPIController;
use App\Http\Controllers\api\StripeApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('vehicles', [VehicleAPIController::class, 'store']);
// Route::post('booking-and-customer', [BookingAndCustomerDetailAPIController::class, 'store']);
Route::post('booking-and-customer', [BookingAndCustomerDetailAPIController::class, 'store'])
    ->middleware('cors');
Route::post('pay-now', [StripeApiController::class, 'stripePost'])->name('api/pay-now');

Route::get('/booking-confirmation', [BookingAndCustomerDetailAPIController::class, 'showBookingConfirmation'])->name('booking.confirmation');