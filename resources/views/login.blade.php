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
        <label for="pass">Password</label><br>
        <input type="password" name="password" placeholder="Enter Your Password"><br>
        <input type="submit">
    </form>
</body>
</html>
