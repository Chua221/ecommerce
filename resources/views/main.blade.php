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
                <th>Mass(Per:kg)</th>
                <th>Price</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($showdata as $item)
                    <tr>
                        <td><img src="{{ $item->image ? asset("storage/".$item->image) : asset('storage/5pIFjRpbjPAtClETuLg2iAiJ2HnYLmGBvW1wbnTM.jpg') }}" alt="Image of {{ $item['v_name'] }}"></td>
                        <td>{{ $item['v_name'] }}</td>
                        <td>{{ $item['mass'] }}kg</td>
                        <td>RM{{ $item['price'] }}</td>
                        <td class="action-column">
                        <div class="action-buttons">
                            <a href="{{ route('viewveg',['id'=>$item['id']]) }}"><button type="button">View Vegetable</button></a>
                    <form action="{{ route('carted',['id'=>$item['id']]) }}" method="POST">
                        @csrf 
                        <button type="submit">Add to cart</button>
                    </form>
                        </div>
                        </td>
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
    text-align: center;
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

td.action-column {
    padding: 10px; /* 为Action列设置更小的padding */
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

.action-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}

button {
    background: linear-gradient(45deg, #007bff, #0056b3);
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background: linear-gradient(45deg, #0056b3, #003d7a);
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

    .action-buttons {
        flex-direction: column;
        gap: 5px;
    }
}
</style>
