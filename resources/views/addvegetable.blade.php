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
    <title>Add Vegetable</title>
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
            font-size: 24px;
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

        input[type="text"], input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }

        input[type="text"]::placeholder {
            color: #777;
        }

        button[type="submit"], button[type="button"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"] {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
        }

        button[type="button"] {
            background: linear-gradient(135deg, #7f7fd5, #86a8e7, #91eae4);
            color: white;
            margin-top: 15px;
        }

        button:hover {
            opacity: 0.85;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            form {
                padding: 15px;
            }

            h2 {
                font-size: 20px;
            }

            input[type="text"], input[type="file"], button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <form action="/add" method="POST" enctype="multipart/form-data">
        @csrf
        <h2>Add Vegetable</h2>
        <label for="v_name">Vegetable Name</label>
        <input type="text" name="v_name" id="v_name" placeholder="Enter Vegetable Name" required>
        
        <label for="mass">Mass(Per:kg):</label>
        <input type="text" name="mass" id="mass" placeholder="Enter Mass" required>
        
        <label for="price">Price</label>
        <input type="text" name="price" id="price" placeholder="Enter Price" required>
        
        <label for="image">Image</label>
        <input type="file" name="image" id="image" required>
        
        <button type="submit">Submit</button>
    </form>
</body>
</html>
