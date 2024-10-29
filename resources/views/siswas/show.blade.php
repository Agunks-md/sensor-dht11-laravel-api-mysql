@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Siswa</h1>
    <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>Alamat:</strong> {{ $siswa->alamat }}</p>
    <p><strong>Jurusan:</strong> {{ $siswa->jurusan }}</p>
    <p><strong>Tahun Angkatan:</strong> {{ $siswa->tahun_angkatan }}</p>
    
   
</div>
@endsection
