<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Address</title>
</head>
<body>
    <a href="{{ route('addadress',['id'=>auth()->user()->id]) }}"><button type="button">Add New Address</button></a>
    <table border>
        <tr>
            <th>address1</th>
            <th>address2</th>
            <th>poscode</th>
            <th>city</th>
            <th>state</th>
        </tr>
        @foreach ($addressdata as $item)
            <tr>
                <td>{{ $item['adress1'] }}</td>
                <td>{{ $item['adress2'] }}</td>
                <td>{{ $item['poscode'] }}</td>
                <td>{{ $item['city'] }}</td>
                <td>{{ $item['state'] }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>