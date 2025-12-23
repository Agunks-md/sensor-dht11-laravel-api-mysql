@extends('layouts.main2')
@section('content')

<h1>Edit Data Sensor Suhu</h1>
<form action="{{ route('sensorsuhu.update', $sensorsuhu->id) }}" method="post">
    @csrf
    @method('put')
    <table>
        <tr>
            <td>Temperatur</td><td><input type="text" name="temperature" value="{{ $sensorsuhu->temperature }}"></td>
        </tr>
        <tr>
            <td>Humidity</td><td><input type="text" name="humidity" value="{{ $sensorsuhu->humidity }}"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="Simpan">
                <a class="btn btn-sm btn-danger" href="{{ url()->previous() }}" >Back</a>
            </td>
        </tr>
    </table>
</form>
@endsection