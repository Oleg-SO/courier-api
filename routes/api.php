<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/couriers', [CourierController::class, 'index']);
    Route::get('/couriers/{id}', [CourierController::class, 'show']);
    Route::post('/couriers', [CourierController::class, 'store']);
    Route::put('/couriers/{id}', [CourierController::class, 'update']);
    Route::patch('/couriers/{id}', [CourierController::class, 'update']);
    Route::post('/couriers/bulk', [CourierController::class, 'bulkStore']);
    Route::post('/orders', [OrderController::class, 'store']);
    Route::post('/orders/assign', [OrderController::class, 'assign']);
    Route::post('/orders/complete', [OrderController::class, 'complete']);
});
