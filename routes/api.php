<?php

use App\Http\Controllers\Dht11Controller;
use App\Http\Controllers\IoTController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('dht11', Dht11Controller::class);

// -----------------------------
// IoT API - Sensor Monitoring
// -----------------------------
// Endpoint untuk menerima data dari perangkat IoT (ESP8266 / NodeMCU)
Route::post('/iot/sensor-data', [IoTController::class, 'storeData']);

// Endpoint untuk mendapatkan data sensor terbaru (dipakai oleh dashboard via fetch)
Route::get('/get-latest-sensor', [IoTController::class, 'getLatestData']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
