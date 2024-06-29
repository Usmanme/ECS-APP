<?php

use App\Http\Controllers\BookingContoller;
use App\Http\Controllers\CustomersContoller;
use App\Http\Controllers\DriversContoller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RidesContoller;
use App\Http\Controllers\VehiclesContoller;
use App\Http\Controllers\FinanceController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\CustomCssFile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['middleware' => ['auth']], function () {

        // Home
        Route::get('/', [HomeController::class, 'index'])->name('home.index');
        Route::get('/get-fares', [HomeController::class, 'getBookRidesFare'])->name('get.fare');
        // Booking
        Route::get('/booking', [BookingContoller::class, 'index']);

        // Drivers
        Route::get('/drivers', [DriversContoller::class, 'index'])->name('drivers');
        Route::post('/drivers/store', [DriversContoller::class, 'store']);
        Route::post('/drivers/update/{id}', [DriversContoller::class, 'update']);

        // Vehicle
        Route::get('/vehicles', [VehiclesContoller::class, 'index']);
        Route::post('/vehicles/store', [VehiclesContoller::class, 'store']);
        Route::post('/vehicles/update/{id}', [VehiclesContoller::class, 'update']);

        // Rides
        Route::get('/rides', [RidesContoller::class, 'index'])->name('rides');

        // Route::post('/rides/store', [RidesContoller::class, 'store']);
          Route::get('/rides/edit',[RidesContoller::class,'edit'])->name('rides.edit');
        Route::post('/rides/store', [RidesContoller::class, 'store'])->name('ride.store');
        Route::post('/rides/update', [RidesContoller::class, 'update'])->name('ride.update');
                Route::get('/rides_edit/{id}/edit', [RidesContoller::class, 'ride_edit'])->name('rides.edits');
        // Route::post('/rides/update/{id}', [RidesContoller::class, 'update']);
        Route::get('/rides/get-vehicles',[RidesContoller::class,'getVehicleByCategory'])->name('rides.vehicles');
        Route::get('/rides/get-driver',[RidesContoller::class,'getDriver'])->name('rides.driver');

        // Customers
        Route::get('/customers', [CustomersContoller::class, 'index']);
        Route::post('/customers/store', [CustomersContoller::class, 'store']);
        Route::post('/customers/update/{id}', [CustomersContoller::class, 'update']);


        // Finance
        Route::get('/finance', [FinanceController::class, 'index']);

        // Logout Routes
        Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
    });

    Route::group(['middleware' => ['guest']], function () {

        // Register Routes
        // Route::get('/register', 'RegisterController@show')->name('register.show');
        // Route::post('/register', 'RegisterController@register')->name('register.perform');

        // Login Routes
        Route::get('/login', 'LoginController@show')->name('login.show');
        Route::post('/login', 'LoginController@login')->name('login.perform');
    });
});
