@extends('layout.main')
@section('content')

<h1>Data Order</h1>
<a href="">Tambah Data</a>
<div class="card">
    <div class="card-header">
        <a href="" class="btn btn-success btn-sm">Tambah Data</a>
    </div>

<div class="card-body">
<table class="table table-sm table-stripped table-bordered">
    <tr>
        <thead>
        <td>No</td>
        <td>Item</td>
        <td>Price</td>
        <td>Qty</td>
        <td>Total</td>        
        <td>Aksi</td>
    </tr>
</thead>
<tbody>
@foreach($order as $item )
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->order_date }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->NamaHari }}</td>
        {{-- <td><img src="{{ asset('storage/img/' . $item->img) }}" alt="" width="5%"></td> --}}
        <td>
            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                <a href="" class="btn btn-sm btn-dark">SHOW</a>
                <a href="" class="btn btn-sm btn-primary">EDIT</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
            </form>
        </td>
    </tr>
@endforeach

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //message with sweetalert
    @if(session('success'))
        Swal.fire({
            icon: "success",
            title: "BERHASIL",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @elseif(session('error'))
        Swal.fire({
            icon: "error",
            title: "GAGAL!",
            text: "{{ session('error') }}",
            showConfirmButton: false,
            timer: 2000
        });
    @endif

</script>

</tbody>
</table>
</div>
</div>
@endsection