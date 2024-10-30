@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auto Refresh Data</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 10px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 3px 5px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        @media (max-width: 400px) {
            th, td {
                padding: 4px;
                font-size: 10px;
            }
        }
    </style>
</head>
<body>
    <h1>Data Sensor</h1>
    <table>
        <thead>
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
                <td>{{$loop->iteration}}</td>
                <td>{{ $item->temperature }}</td>
                <td>{{ $item->humidity }}</td>
                <td>{{ $item->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        function fetchData() {
            $.ajax({
                url: '{{ route("data.sensor") }}', // Gunakan rute yang sudah Anda buat
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