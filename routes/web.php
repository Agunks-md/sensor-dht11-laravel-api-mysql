<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\SiswaController;
use App\Models\Dht11_model;

use Illuminate\Support\Facades\Route;
Route::get('/', [HomeController::class, 'index']); // Rute untuk halaman utama
Route::get('/sensor', [SensorController::class, 'index'])->name('sensor'); // Rute untuk halaman utama
Route::get('/data', [SensorController::class, 'getData'])->name('data.sensor'); // Rute untuk mengambil data



Route::resource('siswas', SiswaController::class);
Route::post('siswas/filter', [SiswaController::class, 'filter'])->name('siswas.filter');


