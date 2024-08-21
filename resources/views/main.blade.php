@extends('header')
@section('content')
@if(session('message'))
    <script>
        window.alert('{{ session("message") }}')
    </script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($showdata as $item)
            <tr>
                <td><img src="{{ $item->image ? asset("storage/".$item->image) : asset('storage/5pIFjRpbjPAtClETuLg2iAiJ2HnYLmGBvW1wbnTM.jpg') }}" alt="Image of {{ $item['v_name'] }}"></td>
                <td>{{ $item['v_name'] }}</td>
                <td>{{ $item['mess'] }}</td>
                <td>{{ $item['price'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
@endsection

<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #e9ecef;
    color: #343a40;
}

table {
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 12px;
    overflow: hidden;
}

thead {
    background-color: #5e6163;
    color: white;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

th {
    font-weight: bold;
    font-size: 18px;
    letter-spacing: 1px;
}

td {
    font-size: 16px;
}

tbody tr:hover {
    background-color: #f1f1f1;
}

img {
    max-width: 120px;
    height: auto;
    border-radius: 10px;
    transition: transform 0.3s;
}

img:hover {
    transform: scale(1.1);
}

@media (max-width: 768px) {
    table {
        width: 100%;
    }

    th, td {
        padding: 10px;
        font-size: 14px;
    }

    img {
        max-width: 80px;
    }
}
</style>
