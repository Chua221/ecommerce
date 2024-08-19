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
    <title>Login</title>
</head>
<body>
    <form action="/login" method="POST">
        @csrf
        <h1>Login Page</h1>
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
        <input type="submit">
    </form>
</body>
</html>
