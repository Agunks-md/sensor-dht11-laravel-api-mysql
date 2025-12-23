<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $jurusan = $request->input('jurusan');
        $tahun_angkatan = $request->input('tahun_angkatan');

        $siswas = SiswaModel::when($jurusan, function ($query, $jurusan) {
                return $query->where('jurusan', $jurusan);
            })
            ->when($tahun_angkatan, function ($query, $tahun_angkatan) {
                return $query->where('tahun_angkatan', $tahun_angkatan);
            })
            ->get();

        return view('siswas.index', compact('siswas', 'jurusan', 'tahun_angkatan'));
    }

    public function filter(Request $request)
    {
        return $this->index($request); // Menggunakan method index untuk menghindari duplikasi kode
    }

    public function create()
    {
        return view('siswas.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        // Simpan data siswa
        SiswaModel::create($request->all());

        return redirect()->route('siswas.index', [
            'jurusan' => $request->jurusan,
            'tahun_angkatan' => $request->tahun_angkatan,
        ])->with('success', 'Data siswa berhasil ditambahkan');
    }

    public function show(string $id, Request $request)
    {
        $siswa = SiswaModel::findOrFail($id);
        return view('siswas.show', compact('siswa', 'request'));
    }

    public function edit(string $id, Request $request)
    {
        $siswa = SiswaModel::findOrFail($id);
        return view('siswas.edit', compact('siswa', 'request'));
    }

    public function update(Request $request, string $id)
    {
        // Validasi data
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $id,
            'nama' => 'required',
            'alamat' => 'required',
            'jurusan' => 'required',
            'tahun_angkatan' => 'required|digits:4|integer',
        ]);

        $siswa = SiswaModel::findOrFail($id);
        $siswa->update($request->all());

        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $siswa = SiswaModel::findOrFail($id);
        $siswa->delete();
    
        return redirect()->route('siswas.index', [
            'jurusan' => request()->jurusan,
            'tahun_angkatan' => request()->tahun_angkatan,
        ])->with('success', 'Data siswa berhasil dihapus');
    }
}
