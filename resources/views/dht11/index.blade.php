@extends('layouts.main2')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Refresh Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="card mt-3">
            <div class="card-header bg-success">
                <h3 class="card-title text-white text-center">Auto Refresh Data</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped table-hover table-bordered table-sm">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Temperature</th>
                            <th>Humidity</th>
                            <th>Timestamp</th>
                        </tr>
                    </thead>
                    <tbody id="data-body">
                        @foreach($data as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->temperature }}</td>
                            <td>{{ $item->humidity }}</td>
                            <td>{{ $item->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function fetchData() {
            $.ajax({
                url: '{{ route("data.sensor") }}',
                method: 'GET',
                success: function(data) {
                    $('#data-body').empty(); // Hapus isi tabel
                    $.each(data, function(index, item) {
                        $('#data-body').append(`
                            <tr>
                                <td>${index + 1}</td>
                                <td>${item.temperature}</td>
                                <td>${item.humidity}</td>
                                <td>${item.created_at}</td>
                            </tr>
                        `);
                    });
                }
            });
        }

        // Refresh data setiap 2 detik
        setInterval(fetchData, 2000);
    </script>
</body>
</html>
@endsection
