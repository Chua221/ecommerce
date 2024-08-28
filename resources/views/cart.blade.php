@extends('header')

@section('title', 'Cart')

@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #f5f5f5;
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

    th, td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #5e6163;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
        height: auto;
        border-radius: 8px;
    }

    .price {
        color: #333;
        font-weight: bold;
    }

    .mass {
        color: #666;
    }

    h1 {
        text-align: center;
        color: #5e6163; /* 与表头背景色匹配 */
        margin-top: 20px;
        font-size: 2em;
        font-weight: bold;
    }

    @media (max-width: 768px) {
        th, td {
            padding: 10px;
        }

        img {
            max-width: 70px;
        }
    }
</style>
<h1>Your cart list</h1>
<table>
    <tr>
        <th>Veg Image</th>
        <th>Veg Mass (Per kg)</th>
        <th>Veg Price</th>
    </tr>
    @foreach ($allcart as $item)
        <tr>
            <td><img src="{{ asset('storage/'.$item->img->image) }}" alt="Vegetable Image"></td>
            <td class="mass">{{ $item['veg_mass'] }}kg</td>
            <td class="price">RM{{ $item['veg_price'] }}</td>
        </tr>
    @endforeach
</table>
    @foreach ($useraddress as $item)
        <p><input type="checkbox">{{ $item['home'] }}</p>
    @endforeach
@endsection
