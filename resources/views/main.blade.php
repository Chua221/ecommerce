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
        <tr>
            @foreach ($showdata as $item)
                <td><img src="{{ $item->image ? asset("storage/".$item->image) : asset('storage/5pIFjRpbjPAtClETuLg2iAiJ2HnYLmGBvW1wbnTM.jpg') }}"></td>
                <td>{{ $item['v_name'] }}</td>
                <td>{{ $item['mess'] }}</td>
                <td>{{ $item['price'] }}</td>
            @endforeach
        </tr>
    </table>
</body>
</html>
@endsection