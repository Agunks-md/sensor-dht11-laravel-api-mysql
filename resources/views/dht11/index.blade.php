<table>
    <thead>
        <tr>
            <th>Temperature</th>
            <th>Humidity</th>
            <th>Timestamp</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->temperature }}</td>
            <td>{{ $item->humidity }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
