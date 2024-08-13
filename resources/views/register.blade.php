<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="/register" method="POST">
        @csrf
        <h1>Register Page</h1>
        <label for="user">Username</label><br>
        <input type="text" name="name" placeholder="Enter Your Username"><br>
        @error('name')
            <p>{{ $message }}</p>
        @enderror
        <label for="email">Email</label><br>
        <input type="email" name="email" placeholder="Enter Your Email"><br>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        <label for="pass">Password</label><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        <label for="pass">Confirmed Password</label><br>
        <input type="password" name="password_confirmation" placeholder="Enter Your Confirmed Password"><br>
        <input type="submit">
    </form>
</body>
</html>