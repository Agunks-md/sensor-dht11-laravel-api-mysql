<?php

namespace App\Http\Controllers;

use App\Models\Sensor30100_model;
use Illuminate\Http\Request;

class SensorMax30100Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sensor30100_model::all(); // Ambil data dari model
        return view('max30100.index', ['data' => $data]); // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
