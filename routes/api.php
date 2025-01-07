<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\MaintenanceController;
use App\Http\Controllers\InsuranceController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
//Route::post('logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);

    Route::middleware('role:administrator|manager')->group(function () {
        Route::resource('cars', CarController::class);
        Route::resource('rentals', RentalController::class);
        Route::resource('maintenances', MaintenanceController::class);
        Route::resource('insurances', InsuranceController::class);
    });

    Route::middleware('role:client|administrator|manager')->group(function () {
        Route::get('cars', [CarController::class, 'index']);
        Route::post('rentals', [RentalController::class, 'store']);
    });
});
