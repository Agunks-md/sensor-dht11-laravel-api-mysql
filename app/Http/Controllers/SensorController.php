<?php

namespace App\Http\Controllers;

use App\Models\Dht11_model;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index() // Method untuk menampilkan view dengan data awal
    {
        $data = Dht11_model::all(); // Ambil data dari model
        return view('dht11.index', ['data' => $data]); // Kirim data ke view
    }

    public function getData()
    {
        $data = Dht11_model::all(); // ambil data dari model
        return response()->json($data);
    }
}

