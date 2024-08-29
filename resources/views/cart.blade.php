@extends('header')
@section('title', 'Cart')
@section('content')
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        background-color: #f5f5f5;
    }

    .container {
        width: 90%;
        margin: 0 auto;
        padding: 20px;
        background-color: #ffffff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
    }

    h1 {
        text-align: center;
        color: #5e6163; /* 与表头背景色匹配 */
        margin-top: 20px;
        font-size: 2em;
        font-weight: bold;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
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

    .delivery-options {
        margin: 20px auto;
        width: 100%;
        text-align: center;
        padding-top: 10px;
        border-top: 2px solid #e0e0e0;
    }

    .delivery-options p {
        margin: 10px 0;
    }

    .custom-select {
        width: 50%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 8px;
        display: none; /* 初始状态为隐藏 */
        margin: 10px auto 0;
        background-color: #f9f9f9;
        font-size: 1em;
    }

    @media (max-width: 768px) {
        th, td {
            padding: 10px;
        }

        img {
            max-width: 70px;
        }

        .custom-select {
            width: 80%;
        }
    }
</style>
    <h1>Your cart list</h1>
<div class="container">
    
    <table>
        <tr>
            <th>Veg Image</th>
            <th>Veg Mass (Per kg)</th>
            <th>Veg Price</th>
        </tr>
        @foreach ($allcart as $item)
            <tr>
                <td class="mass"><img src="{{ asset('storage/'.$item->img->image) }}" alt="Vegetable Image"><br>{{ $item->img->v_name }}</td>
                <td class="mass">{{ $item['veg_mass'] }}kg</td>
                <td class="price">RM{{ $item['veg_price'] }}</td>
            </tr>
        @endforeach
    </table>

    <div class="delivery-options">
        <input type="radio" name="deliveryOption" value="pickup" id="pickupOption" checked onclick="toggleAddressSelect()">
        <label for="pickupOption">Pick Up</label>
        <input type="radio" name="deliveryOption" value="delivery" id="deliveryOption" onclick="toggleAddressSelect()">
        <label for="deliveryOption">Delivery</label>
        <select id="addressSelect" class="custom-select">
            @foreach ($useraddress as $item)
                <option value="{{ $item['adress1'] }},{{ $item['adress2'] }},{{ $item['poscode'] }},{{ $item['city'] }},{{ $item['state'] }}">{{ $item['home'] }}</option>
            @endforeach
        </select>
    </div>
</div>

<script>
    function toggleAddressSelect() {
        var deliveryOption = document.getElementById('deliveryOption');
        var addressSelect = document.getElementById('addressSelect');

        if (deliveryOption.checked) {
            addressSelect.style.display = 'block';
        } else {
            addressSelect.style.display = 'none';
        }
    }
</script>
@endsection
