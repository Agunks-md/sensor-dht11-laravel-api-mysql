@extends('layouts.main2')

@section('content')
<div class="container">
    <h1>Tambah Data Siswa</h1>

    <form method="POST" action="{{ route('siswas.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nis">NIS:</label>
            <input type="text" id="nis" name="nis"  required class="form-control">
        </div>
        <div class="mb-3">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama"  required class="form-control">
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat"  required class="form-control">
        </div>
        <div class="mb-3">
            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tahun_angkatan">Tahun Angkatan:</label>
            <input type="text" id="tahun_angkatan" name="tahun_angkatan"  required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      
    </form>
</div>
@endsection
