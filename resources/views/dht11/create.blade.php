<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data DHT11</title>
</head>
<body>
    <h1>Tambah Data DHT11</h1>
    <form action="{{ url('/dht11/store') }}" method="POST">
        @csrf
        <label for="temperature">Temperature:</label>
        <input type="text" name="temperature" id="temperature" required>
        
        <label for="humidity">Humidity:</label>
        <input type="text" name="humidity" id="humidity" required>
        
        <button type="submit">Simpan Data</button>
    </form>
</body>
</html>
