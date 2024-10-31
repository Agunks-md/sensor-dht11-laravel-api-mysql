<form id="filterForm" method="POST" action="{{ route('siswas.filter') }}">
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="jurusan" class="form-label">Jurusan:</label>
            <select id="jurusan" name="jurusan" class="form-select">
                <option value="">Pilih Jurusan</option>
                <option value="IPA" {{ old('jurusan', $jurusan ?? '') == 'IPA' ? 'selected' : '' }}>IPA</option>
                <option value="IPS" {{ old('jurusan', $jurusan ?? '') == 'IPS' ? 'selected' : '' }}>IPS</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="tahun_angkatan" class="form-label">Tahun Angkatan:</label>
            <select id="tahun_angkatan" name="tahun_angkatan" class="form-select">
                <option value="">Pilih Tahun Angkatan</option>
                <option value="2020" {{ old('tahun_angkatan', $tahun_angkatan ?? '') == '2020' ? 'selected' : '' }}>2020</option>
                <option value="2021" {{ old('tahun_angkatan', $tahun_angkatan ?? '') == '2021' ? 'selected' : '' }}>2021</option>
            </select>
        </div>
        <div class="col-md-4 d-flex align-items-end">
            <button type="button" class="btn btn-primary" id="filterButton">Filter</button>
        </div>
    </div>
</form>

<table class="table table-bordered mt-3" id="siswaTable">
    <!-- Table header -->
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
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#filterButton').on('click', function() {
            $.ajax({
                type: 'POST',
                url: '{{ route('siswas.filter') }}',
                data: $('#filterForm').serialize(),
                success: function(data) {
                    // Update the table body with the returned data
                    $('#siswaTable tbody').html(data);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endsection
