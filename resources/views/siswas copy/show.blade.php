@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Siswa</h1>
    
    <div class="card mb-3">
        <div class="card-header">
            <h5>Informasi Siswa</h5>
        </div>
        <div class="card-body">
            <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
            <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
            <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
            <p><strong>Jurusan:</strong> {{ $siswa->jurusan }}</p>
            <p><strong>Tahun Angkatan:</strong> {{ $siswa->tahun_angkatan }}</p>
        </div>
    </div>
    
    <a href="{{ route('siswas.index', ['jurusan' => request()->jurusan, 'tahun_angkatan' => request()->tahun_angkatan]) }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
