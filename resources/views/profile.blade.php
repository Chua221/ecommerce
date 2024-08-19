<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
    <form action="/profile" method="POST">
        <label for="">No.IC</label>
        <input type="number" name="no_ic" placeholder="Enter Your IC Number">
        <label for="">Gender</label>
        <select name="gender" id="">
            <option value=""></option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
    </form>
</body>
</html>