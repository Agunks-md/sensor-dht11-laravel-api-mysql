@extends('layouts.main2')

@section('content')
<div class="container">
    <h1>Edit Data Siswa</h1>

    <form method="POST" action="{{ route('siswas.update', $siswa->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nis">NIS:</label>
            <input type="text" id="nis" name="nis" value="{{ old('nis', $siswa->nis) }}" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $siswa->nama) }}" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $siswa->alamat) }}" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="jurusan">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" value="{{ old('jurusan', $siswa->jurusan) }}" required class="form-control">
        </div>
        <div class="mb-3">
            <label for="tahun_angkatan">Tahun Angkatan:</label>
            <input type="text" id="tahun_angkatan" name="tahun_angkatan" value="{{ old('tahun_angkatan', $siswa->tahun_angkatan) }}" required class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('siswas.index', ['jurusan' => request()->jurusan, 'tahun_angkatan' => request()->tahun_angkatan]) }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
