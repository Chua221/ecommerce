@extends('header')

@section('title', 'History')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>History</title>
    <style>
        body {
            background: linear-gradient(135deg, #1e3c72 , #2a5298 , #3a7bd5 );
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding-top: 70px;  
        }

        h1 {
            color: #fff;
            font-size: 32px;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            max-width: 900px;
            border-collapse: collapse;
            margin: 20px 0;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            font-size: 16px;
        }

        th {
            background-color: #0072ff;
            color: white;
            font-weight: bold;
        }

        td {
            background-color: #f9f9f9;
        }

        td:nth-child(3) {
            color: green;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table, th, td {
                font-size: 14px;
                padding: 8px 10px;
            }
        }
        header {
    width: 100%;
    position: fixed;
    top: 0;
    background-color: #333; 
    padding: 15px;
    z-index: 1000;
}

    </style>
</head>
<body>
    <h1>Your Purchase History</h1>
    <table>
        <tr>
            <th>Bill Time</th>
            <th>Arrival Form</th>
            <th>Total Price</th>
            <th>Address</th>
        </tr>
        @foreach ($history as $item)
            <tr>
                <td>{{ $item['bill_id'] }}</td>
                <td>{{ $item['deliveryOption'] }}</td>
                <td>RM {{ number_format($item['total_price'], 2) }}</td>
                <td>{{ $item['home'] ?: 'No Address Provided' }}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>
@endsection
