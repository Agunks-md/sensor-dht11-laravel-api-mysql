<?php

namespace App\Http\Controllers;

use App\Models\Dht11_model;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function getData()
    {
        // $data = Dht11_model::all();
        // return view('dht11.index', compact('data'));
        //return response()->json($data);
        $data = Dht11_model::all(); // ambil data dari model
        return response()->json($data);
        
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
