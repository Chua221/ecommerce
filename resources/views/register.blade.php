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
<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

form {
    background-color: #ffffff;
    padding: 20px 40px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    width: 300px;
}

h1 {
    margin-bottom: 20px;
    color: #333;
    font-size: 24px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #333;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
    outline: none;
}

input[type="submit"] {
    background-color: #8dd2f7;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #7caed5;
}

p {
    color: #f44336;
    font-size: 14px;
    margin-top: -16px;
    margin-bottom: 20px;
}

</style>