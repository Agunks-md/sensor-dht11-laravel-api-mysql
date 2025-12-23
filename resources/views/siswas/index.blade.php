

@extends('layouts.main2')
@section('content')
<div class="container-fluid">
<div class="card mt-3">
<div class="card-body p-0">
    <a class="btn btn-success btn-sm" href="{{ route('siswas.create') }}">Add</a>
    <p></p>
<table class="table table-striped table-hover table-bordered table-sm">
<thead class="thead-dark">
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
        </td>
    </tr>
    @endforeach
</tbody>
</table>
</div>
</div>
</div>

@endsection
