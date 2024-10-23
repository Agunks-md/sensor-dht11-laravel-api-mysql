<?php

use App\Http\Controllers\Dht11Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('dht11', Dht11Controller::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
