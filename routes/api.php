<?php

use App\Http\Controllers\Api\BookingTransactionController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\OfficeSpaceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//City
Route::get('/city/{city:slug}', [CityController::class, 'show']);
Route::apiResources('/cities', CityController::class); // index included all crud API

//Office
Route::get('/office/{officeSpace:slug}', [OfficeSpaceController::class, 'show']);
Route::apiResources('/offices', OfficeSpaceController::class);

//Booking
Route::post('/booking-transaction', [BookingTransactionController::class, 'store']);
Route::post('/check-booking', [BookingTransactionController::class, 'booking_details']);
