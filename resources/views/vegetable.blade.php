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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            background: linear-gradient(135deg, #f2f9f2, #e0e0e0); /* Soft green accent */
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Shadow effect */
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin: 20px;
            transition: box-shadow 0.3s ease-in-out; /* Shadow transition */
        }

        .card:hover {
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3); /* Hover shadow effect */
        }

        .card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            background: rgba(0, 255, 0, 0.2);
            width: 150px;
            height: 150px;
            border-radius: 50%;
            z-index: 0;
        }

        .card::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            background: rgba(0, 128, 0, 0.2);
            width: 150px;
            height: 150px;
            border-radius: 50%;
            z-index: 0;
        }

        .card img {
            max-width: 100%;
            border-radius: 10px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Image shadow */
        }

        .card label {
            font-weight: bold;
            color: #333;
            display: block;
            margin-bottom: 5px;
            text-align: left;
            position: relative;
            z-index: 1;
        }

        .card h3 {
            margin: 0 0 15px 0;
            color: #555;
            text-align: left;
            position: relative;
            z-index: 1;
        }

        .card input[type="text"] {
            padding: 10px;
            border: 2px solid #ced4da;
            border-radius: 5px;
            width: calc(100% - 24px); /* Adjust width to fit padding */
            margin-bottom: 15px;
            font-size: 16px;
            color: #495057;
            background: #fff;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1); /* Inner shadow */
        }

        .card input[type="text"]:focus {
            border-color: #28a745;
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25); /* Focus shadow */
        }

        .card button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: linear-gradient(45deg, #28a745, #218838);
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            position: relative;
            z-index: 1;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Button shadow */
        }

        .card button:hover {
            background: linear-gradient(45deg, #218838, #1e7e34);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Hover button shadow */
        }
    </style>
</head>
<body>
    <div class="card">
        <label>Veg Image:</label>
        <img src="{{ $vegetable->image ? asset('storage/'.$vegetable->image) : asset('storage/5pIFjRpbjPAtClETuLg2iAiJ2HnYLmGBvW1wbnTM.jpg') }}" alt="Vegetable Image">

        <label>Veg Name:</label>
        <h3>{{ $vegetable->v_name }}</h3>

        <label>Veg Mass (Per: kg):</label>
        <input type="text" name="veg_mass" onblur="recalc()" value="{{ $vegetable->mass }}" id="1">

        <label>Veg Price:</label>
        <input type="text" onblur="recalc()" value="{{ $vegetable->price }}" id="2" readonly><br>

        <label>Total Price:</label>
        <input type="text" id="3" name="veg_price" readonly>

        <form action="{{ route('carts',['id'=>$vegetable->id]) }}" method="POST">
            @csrf
            <button type="submit">Add To Cart</button>
        </form>
    </div>
</body>
</html>
<script>
    function recalc() {
        var i1 = parseFloat(document.getElementById("1").value);
        var i2 = parseFloat(document.getElementById("2").value);
        i1 = isNaN(i1) ? 0 : i1;
        i2 = isNaN(i2) ? 0 : i2;
        document.getElementById("3").value = i1 * i2;
    }
</script>
