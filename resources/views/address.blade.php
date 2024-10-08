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
    <title>Address</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298, #3a7bd5, #00d2ff);
            background-attachment: fixed;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
            min-height: 100vh;
            margin: 0;
            color: #333;
        }

        a {
            text-decoration: none;
        }

        a button[type="button"] {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s ease;
            margin: 20px 0;
        }

        a button[type="button"]:hover {
            opacity: 0.85;
        }

        h1 {
            font-size: 24px;
            color: white;
            margin-bottom: 20px;
            text-align: center;
        }

        .address-wrapper {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
            width: 100%;
            max-width: 800px;
        }

        .address-card {
            background: linear-gradient(135deg, #ffffff, #e0e0e0);
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .address-detail {
            margin-bottom: 10px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .address-detail label {
            font-weight: bold;
            margin-right: 10px;
        }

        .address-controls {
            display: flex;
            justify-content: space-between;
        }

        .address-controls button[type="button"],
        .address-controls button[type="submit"] {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: opacity 0.3s ease;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5px;
        }

        .address-controls button[type="button"] {
            background: linear-gradient(135deg, #7f7fd5, #86a8e7, #91eae4);
            color: white;
        }

        .address-controls button[type="submit"] {
            background: linear-gradient(135deg, #ff5f6d, #ffc371);
            color: white;
            margin-top: 17px;
        }

        .address-controls button:hover {
            opacity: 0.85;
        }

        i {
            margin-right: 8px;
            color: #555;
        }

        button i {
            color: white;
        }

        @media (max-width: 768px) {
            .address-wrapper {
                grid-template-columns: 1fr;
            }

            .address-detail {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
</head>
<body>
    <a href="{{ route('addadress', ['id' => auth()->user()->id]) }}">
        <button type="button"><i class="fas fa-plus"></i> Add New Address</button>
    </a>

    <h1><i class="fas fa-address-book"></i> Your Addresses</h1>

    <div class="address-wrapper">
        @foreach ($addressdata as $item)
        <div class="address-card">
            <div class="address-detail">
                <label><i class="fas fa-home"></i> Home Name:</label>
                <span>{{ $item['home'] }}</span>
            </div>
            <div class="address-detail">
                <label><i class="fas fa-map-marker-alt"></i> Address 1:</label>
                <span>{{ $item['adress1'] }}</span>
            </div>
            <div class="address-detail">
                <label><i class="fas fa-map-pin"></i> Address 2:</label>
                <span>{{ $item['adress2'] }}</span>
            </div>
            <div class="address-detail">
                <label><i class="fas fa-envelope-open"></i> Postcode:</label>
                <span>{{ $item['poscode'] }}</span>
            </div>
            <div class="address-detail">
                <label><i class="fas fa-city"></i> City:</label>
                <span>{{ $item['city'] }}</span>
            </div>
            <div class="address-detail">
                <label><i class="fas fa-map-signs"></i> State:</label>
                <span>{{ $item['state'] }}</span>
            </div>
            <div class="address-controls">
                <a href="{{ route('edit', $item['id']) }}">
                    <button type="button"><i class="fas fa-edit"></i> Edit</button>
                </a>
                <form action="{{ route('delete', $item['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><i class="fas fa-trash-alt"></i> Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>
@endsection
