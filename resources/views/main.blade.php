@extends('header')
@section('content')
@session('message')
    <script>
        window.alert('{{ session("message") }}')
    </script>
@endsession
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
    <table border>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Mess</th>
            <th>Price</th>
        </tr>
            @foreach ($showdata as $item)
        <tr>
                <td><img src="{{ $item->image ? asset("storage/".$item->image) : asset('storage/5pIFjRpbjPAtClETuLg2iAiJ2HnYLmGBvW1wbnTM.jpg') }}"></td>
                <td>{{ $item['v_name'] }}</td>
                <td>{{ $item['mess'] }}</td>
                <td>{{ $item['price'] }}</td>
        </tr>
            @endforeach
    </table>
</body>
</html>
@endsection

<style>
    /* Styles for the entire page */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

/* Table Styles */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Table Header Styles */
th {
    background-color: #343a40;
    color: white;
    padding: 10px;
    text-align: left;
    font-weight: bold;
}

/* Table Data Cell Styles */
td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

/* Image Styles */
td img {
    max-width: 100px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
}

</style>