<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Address</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298, #3a7bd5, #00d2ff);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: linear-gradient(135deg, #ffffff, #e0e0e0);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            padding: 15px;
            border-radius: 5px;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }

        input::placeholder {
            color: #777;
        }

        p {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            transition: opacity 0.3s ease;
        }

        button[type="submit"]:hover {
            opacity: 0.85;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            form {
                padding: 15px;
            }

            h2 {
                font-size: 24px;
            }

            input[type="text"], input[type="email"], input[type="password"], button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <form action="/adress" method="POST">
        @csrf
        <h2>Add Address</h2>
        <label for="home">Home Name</label>
        <input type="text" name="home" id="home" placeholder="Enter Your Home Name">
        @error('home')
            <p>{{ $message }}</p>
        @enderror

        <label for="adress1">Address 1</label>
        <input type="text" name="adress1" id="adress1" placeholder="Enter Your Address 1" >
        @error('adress1')
            <p>{{ $message }}</p>
        @enderror
        
        <label for="adress2">Address 2</label>
        <input type="text" name="adress2" id="adress2" placeholder="Enter Your Address 2">
        @error('adress2')
            <p>{{ $message }}</p>
        @enderror
        
        <label for="poscode">Postcode</label>
        <input type="text" name="poscode" id="poscode" placeholder="Enter Your Postcode" >
        @error('poscode')
            <p>{{ $message }}</p>
        @enderror
        
        <label for="city">City</label>
        <input type="text" name="city" id="city" placeholder="Enter Your City" >
        @error('city')
            <p>{{ $message }}</p>
        @enderror
        
        <label for="state">State</label>
        <input type="text" name="state" id="state" placeholder="Enter Your State" >
        @error('state')
            <p>{{ $message }}</p>
        @enderror
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
