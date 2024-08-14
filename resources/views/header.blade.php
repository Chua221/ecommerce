<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Main Page')</title>
    <style>
        /* CSS Styling for the header */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background-color: #333;
            padding: 15px 20px;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        header nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 16px;
        }
        header nav a:hover {
            text-decoration: underline;
        }
        header form {
            margin: 0;
        }
        header form button {
            background-color: #ff5555;
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 16px;
            cursor: pointer;
        }
        header form button:hover {
            background-color: #ff3333;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="/" style="color:white;">Main Page</a></h1>
        <nav>
            @auth
                <a href="/profile">{{ auth()->user()->name }}</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="/register">Register</a>
                <a href="/login">Login</a>
            @endauth
        </nav>
    </header>
    <hr>
    @yield('content')
</body>
</html>

