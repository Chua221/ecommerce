@extends('header')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vegetable</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            margin: 0;
            padding: 0;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
        }

        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding-top: 120px;
            background-color: #f8f9fa;
        }

        .card {
            background: linear-gradient(135deg, #f2f9f2, #e0e0e0);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin: 20px;
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .card label, .card h3 {
            color: #333;
            position: relative;
            z-index: 1;
            text-align: left;
        }

        .card input {
            padding: 10px;
            border: 2px solid #ced4da;
            border-radius: 5px;
            width: calc(100% - 24px);
            margin-bottom: 15px;
            font-size: 16px;
            color: #495057;
            background: #fff;
        }

        .card button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(45deg, #28a745, #218838);
            color: white;
            cursor: pointer;
            margin-top: 20px;
        }

        .card button:hover {
            background: linear-gradient(45deg, #218838, #1e7e34);
        }
    </style>
</head>
<body>
    <header>
        @include('header') <!-- This ensures your header stays unchanged at the top -->
    </header>
    
    <div class="content">
        <div class="card">
            <form action="{{ route('carts', ['id'=>$vegetable->id]) }}" method="POST">
                @csrf
                <label>Veg Image:</label>
                <img src="{{ $vegetable->image ? asset('storage/'.$vegetable->image) : asset('storage/default.jpg') }}" alt="Vegetable Image">
                
                <label>Veg Name:</label>
                <h3>{{ $vegetable->v_name }}</h3>

                <label>Veg Mass (Per: kg):</label>
                <input type="number" name="veg_mass" min="0.1" step="0.1" oninput="recalc()" value="{{ $vegetable->mass }}" id="1">

                <label>Veg Price:</label>
                <input type="text" value="{{ $vegetable->price }}" id="2" readonly><br>

                <label>Total Price:</label>
                <input type="text" id="3" name="veg_price" value="{{ $vegetable->price }}" readonly>

                <button type="submit">Add To Cart</button>
            </form>
        </div>
    </div>

    <script>
        function recalc() {
            var i1 = parseFloat(document.getElementById("1").value);
            var i2 = parseFloat(document.getElementById("2").value);
            document.getElementById("3").value = i1 * i2;
        }
    </script>
</body>
</html>
@endsection
