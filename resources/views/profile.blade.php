<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f06, #4a90e2);
            color: #fff;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        form {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            width: 100%;
            color: #333;
        }

        label {
            font-size: 16px;
            color: #555;
        }

        input[type="number"], select, input[type="text"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #4a90e2;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #357ab7;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #4a90e2;
        }
    </style>
</head>
<body>
    <form action="/profile" method="POST">
        @csrf
        <h2>Profile Information</h2>
        <label for="no_ic">No.IC</label>
        <input type="text" name="no_ic" placeholder="Enter Your IC Number" required>
        <label for="gender">Gender</label>
        <select name="gender" id="gender" required>
            <option value="" disabled selected>Select your gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        <a href="{{ route('adress',['id'=>auth()->user()->id]) }}"><button type="button">View Adress</button></a>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
