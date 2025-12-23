@extends('layout.main')
@section('content')

<h1>Jadwal Pelajaran</h1>
<div class="card">
        <div class="card-header">
        <a href="" class="btn btn-primary btn-sm">Tambah Data</a>
        </div>
        <div class="card-body">   
            <table class="table table-sm table-stripped table-bordered">
                <thead>
            <tr>
                <td>No</td>
                <td>Nama Hari</td>
                <td>Nama Guru</td>
                <td>Pelajaran</td>
                <td>Jam Mulai</td>
               
                <td>Tanggal</td>
                <td>Aksi</td>
                <td>Delete</td>
            </tr>
            </thead>
            @foreach ($nilai as $rows)
            <tbody>
                 <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $rows->nama_siswa }} </td>
                    <td>{{ $rows->nama_guru }}</td>
                    <td>{{ $rows->nama_pelajaran }}</td>
                    <td>{{ $rows->nilai_angka }} </td>
                    <td>{{ $rows->created_at }}</td>
                    <td>
                        <a href="">Edit</a>                                      
                    </td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="" method="POST">
                            <a href="" class="btn btn-sm btn-dark">SHOW</a>
                            <a href=") }}" class="btn btn-sm btn-primary">EDIT</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                        </form>
                    </td>
                 </tr>   
            @endforeach
            </tbody>
            </table>
        </div>
</div>

@endsection

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