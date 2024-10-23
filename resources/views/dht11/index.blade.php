<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody id="data-table-body">
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
        fetch('/data')
            .then(response => response.json())
            .then(data => {
                const tableBody = document.getElementById('data-table-body');
                tableBody.innerHTML = ''; // Clear existing rows
                data.forEach((item, index) => {
                    const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.temperature}</td>
                            <td>${item.humidity}</td>
                            <td>${item.created_at}</td>
                        </tr>
                    `;
                    tableBody.innerHTML += row; // Add new row
                });
            })
            .catch(error => console.error('Error fetching data:', error));
    }

    // Fetch data every 2 seconds
    setInterval(fetchData, 2000);
</script>
