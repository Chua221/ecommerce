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
        <label for="Adress2">Adress2</label><br>
        <input type="text" name="adress2" id="Adress2" placeholder="Enter Your Adress2"><br>
        <label for="Poscode">Poscode</label><br>
        <input type="text" name="poscode" id="Poscode" placeholder="Enter Your Poscode"><br>
        <label for="City">City</label><br>
        <input type="text" name="city" id="City" placeholder="Enter Your City"><br>
        <label for="State">State</label><br>
        <input type="text" name="state" id="State" placeholder="Enter Your State"><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>