<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index'); // Mengarahkan ke index.blade.php yang menggunakan layout app.blade.php
    }
}
