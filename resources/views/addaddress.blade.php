<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Address</title>
</head>
<body>
    <form action="/adress" method="POST">   
        @csrf
        <label for="Adress1">Adress1</label><br>
        <input type="text" name="adress1" id="Adress1" placeholder="Enter Your Adress1"><br>
        @error('adress1')
            <p>{{ $message }}</p>
        @enderror
        <label for="Adress2">Adress2</label><br>
        <input type="text" name="adress2" id="Adress2" placeholder="Enter Your Adress2"><br>
        @error('adress2')
            <p>{{ $message }}</p>
        @enderror
        <label for="Poscode">Poscode</label><br>
        <input type="text" name="poscode" id="Poscode" placeholder="Enter Your Poscode"><br>
        @error('poscode')
            <p>{{ $message }}</p>
        @enderror
        <label for="City">City</label><br>
        <input type="text" name="city" id="City" placeholder="Enter Your City"><br>
        @error('city')
            <p>{{ $message }}</p>
        @enderror
        <label for="State">State</label><br>
        <input type="text" name="state" id="State" placeholder="Enter Your State"><br>
        @error('state')
            <p>{{ $message }}</p>
        @enderror
        <button type="submit">Submit</button>
    </form>
</body>
</html>
<style>
p {
    color: red;
}
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #333;
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    color: #555;
}

input[type="text"]::placeholder {
    color: #999;
}

button[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #8dd2f7;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button[type="submit"]:hover {
    background-color: #7caed5;
}

@media (max-width: 500px) {
    form {
        padding: 15px;
    }

    label {
        font-size: 14px;
    }

    input[type="text"] {
        padding: 8px;
        font-size: 14px;
    }

    button[type="submit"] {
        padding: 10px;
        font-size: 14px;
    }
}

</style>