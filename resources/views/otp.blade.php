<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Otp Verify</title>
</head>
<body>
    <form action="/otp_verify" method="POST">
        @csrf
        <h1>Otp Verify</h1>
        <input type="text" name="otp" placeholder="Enter your otp"><br>
        <input type="submit">
    </form>
</body>
</html>