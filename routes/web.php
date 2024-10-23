<?php

use App\Http\Controllers\SensorController;
use App\Models\Dht11_model;
use Illuminate\Support\Facades\Route;

Route::get('/', [SensorController::class, 'index']); // Rute untuk halaman utama
Route::get('/data', [SensorController::class, 'getData'])->name('data.sensor'); // Rute untuk mengambil data




