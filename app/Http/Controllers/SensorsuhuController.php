<?php

namespace App\Http\Controllers;

use App\Models\Dht11_model;
use Illuminate\Http\Request;

class SensorsuhuController extends Controller
{
    public function index()
    {
        $sensor = Dht11_model::get();
       return view('sensorsuhu.index', compact('sensor'));
    }

    public function create()
    {
        return view('sensorsuhu.create');
    }

    public function store(Request $request)
    {
        $sensor = new Dht11_model();
        $sensor->temperature = $request->temperature;
        $sensor->humidity = $request->humidity;
        $sensor->save();
        return redirect('sensorsuhu');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $sensorsuhu = Dht11_model::find($id);
        return view('sensorsuhu.edit', compact('sensorsuhu'));
    }

    public function update(Request $request, string $id)
    {
        $sensorsuhu = Dht11_model::find($id);
        $sensorsuhu->temperature = $request->temperature;
        $sensorsuhu->humidity = $request->humidity;
        $sensorsuhu->save();
        return redirect('sensorsuhu');
    }

    public function destroy(string $id)
    {
        $sensorsuhu = Dht11_model::findOrFail($id);
        $sensorsuhu->delete();
        return redirect()->route('sensorsuhu.index')->with(['success' => 'Data Berhasil Dihapus!']);        
    }
}
