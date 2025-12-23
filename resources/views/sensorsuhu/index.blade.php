@extends('layouts.main2')
@section('content')


<h1>Ini adalah halaman index</h1>

<div class="row">
    <div class="md-4">
        <a class="btn btn-success btn-sm" href="{{ route('sensorsuhu.create') }}">Tambah Data</a>

    </div>
</div>
<table class="table table-sm table-stripped table-bordered">
    <tr>
        <td>No</td>
        <td>Temperatur</td>
        <td>Humidity</td>
        <td>Aksi</td>
    </tr>
    @foreach($sensor as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->temperature }}</td>
            <td>{{ $item->humidity }}</td>
            <td>
                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('sensorsuhu.destroy', $item->id) }}" method="POST">
                    <a href="{{ route('sensorsuhu.show', $item->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                    <a href="{{ route('sensorsuhu.edit', $item->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>

@endsection