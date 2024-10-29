@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Siswa</h1>

    <!-- Filter Form -->
    <form method="POST" action="{{ route('siswas.filter') }}">
        @csrf
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan:</label>
            <input type="text" id="jurusan" name="jurusan" class="form-control" value="{{ old('jurusan', $jurusan ?? '') }}">
        </div>
        <div class="mb-3">
            <label for="tahun_angkatan" class="form-label">Tahun Angkatan:</label>
            <input type="text" id="tahun_angkatan" name="tahun_angkatan" class="form-control" value="{{ old('tahun_angkatan', $tahun_angkatan ?? '') }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
    </form>
    
    <!-- Data Siswa Table -->
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Jurusan</th>
                <th>Tahun Angkatan</th>
              <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->jurusan }}</td>
                <td>{{ $siswa->tahun_angkatan }}</td>
               <td>
                <a href="{{ route('siswas.show', $siswa->id) }}" class="btn btn-success">Show</a>
                <a href="{{ route('siswas.edit', $siswa->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('siswas.destroy', $siswa->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                </form>
                <a href="{{ route('siswas.index') }}" class="btn btn-secondary">Kembali</a>
               </td>
            </tr>
        @endforeach
        
        </tbody>
    </table>

    <!-- Button to Open Modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSiswaModal">
        Tambah Data Siswa
    </button>

    <!-- Modal -->
    <div class="modal fade" id="addSiswaModal" tabindex="-1" aria-labelledby="addSiswaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('siswas.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="addSiswaModalLabel">Tambah Data Siswa</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="jurusan" value="{{ old('jurusan', $jurusan ?? '') }}">
                        <input type="hidden" name="tahun_angkatan" value="{{ old('tahun_angkatan', $tahun_angkatan ?? '') }}">

                        <div class="mb-3">
                            <label for="nis" class="form-label">NIS:</label>
                            <input type="text" id="nis" name="nis" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama:</label>
                            <input type="text" id="nama" name="nama" required class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat:</label>
                            <input type="text" id="alamat" name="alamat" required class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
@endsection
@endsection
