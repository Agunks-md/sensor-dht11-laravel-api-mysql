<?php

namespace App\Http\Controllers;

use App\Models\Nilai_model;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nilai = Nilai_model::select('nilai.nilai_angka', 'guru.nama_guru',
                'pelajaran.nama_pelajaran','siswa.nama_siswa','nilai.created_at')
                ->join('guru', 'guru.id_guru','=','nilai.id_guru')
                ->join('pelajaran', 'pelajaran.id','=','nilai.id_pelajaran')
                ->join('siswa', 'siswa.id_siswa','=','nilai.id_siswa')
                ->get();
return view ('nilai.index', compact('nilai'));
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
