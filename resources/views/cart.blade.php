<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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

        @media (max-width: 768px) {
            th, td {
                padding: 10px;
            }

            img {
                max-width: 70px;
            }
        }
    </style>
</head>
<body>
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
</body>
</html>
