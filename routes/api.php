<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\SubscriberController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:sanctum')->post('/subscribe', [SubscriberController::class, 'subscribe']);
