<?php

namespace App\Http\Controllers;

use App\Models\Dht11_model;
use Illuminate\Http\Request;

class Dht11Controller extends Controller
{
    public function index()
    {
        $data = Dht11_model::all();

        if ($data) {
            return response()->json(['message' => 'OK', 'data' => $data], 200);
        } else {
            return response()->json(['message' => 'No Record'], 200);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        Dht11_model::create([
            'temperature' => $validatedData['temperature'],
            'humidity'    => $validatedData['humidity'],
        ]);

        return response()->json(['message' => 'Data saved successfully'], 201);
    }

    // Update data DHT11
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'temperature' => 'required|numeric',
            'humidity' => 'required|numeric',
        ]);

        $dht11 = Dht11_model::find($id);

        if ($dht11) {
            $dht11->update([
                'temperature' => $validatedData['temperature'],
                'humidity'    => $validatedData['humidity'],
            ]);

            return response()->json(['message' => 'Data updated successfully'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }

    public function show($id)
    {
        $data = Dht11_model::find($id);

        if ($data) {
            return response()->json($data, 200);
        } else {
            return response()->json(['message' => 'Data not found'], 404);
        }
    }

    // Delete data DHT11
    public function destroy($id)
    {
        $dht11 = Dht11_model::find($id);

        if ($dht11) {
            $dht11->delete();

            return response()->json(['message' => 'Data deleted successfully'], 200);
        } else {
            return response()->json(['message' => 'Record not found'], 404);
        }
    }
}
