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
        
        $query = SiswaModel::query();
        
        if ($jurusan) {
            $query->where('jurusan', $jurusan);
        }

        if ($tahun_angkatan) {
            $query->where('tahun_angkatan', $tahun_angkatan);
        }

        $siswas = $query->get();

        return view('siswas.index', compact('siswas', 'jurusan', 'tahun_angkatan'));
    }

    public function filter(Request $request)
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
    
        // Return the view for the table rows only
        return view('siswas.partials.tableRows', compact('siswas'));
    }
    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required',
            'alamat' => 'required',
        ]);

        SiswaModel::create($validatedData);

        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $siswa = SiswaModel::findOrFail($id);
        $siswa->delete();

        return response()->json(['success' => true]);
    }
}
