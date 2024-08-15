<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Vegetable</title>
</head>
<body>
    <form action="/add" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Add Vegetable</h1>
        <label>Vegetable Name</label><br>
        <input type="text" name="v_name"><br>
        <label>Mess</label><br>
        <input type="text" name="mess"><br>
        <label>Price</label><br>
        <input type="text" name="price"><br>
        <label>Image</label><br>
        <input type="file" name="image"><br>
        <input type="submit">
    </form>
</body>
</html>
