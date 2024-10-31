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
