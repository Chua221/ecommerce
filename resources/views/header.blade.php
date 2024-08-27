<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Main Page')</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        header {
            background: linear-gradient(90deg, #333, #555);
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
        header nav {
            display: flex;
            align-items: center;
        }
        header nav a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        header nav a:hover {
            background: linear-gradient(90deg, #ff5555, #ff3333);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        header form {
            margin: 0;
            display: inline;
        }
        header form button {
            background: linear-gradient(90deg, #ff5555, #ff3333);
            color: white;
            border: none;
            padding: 8px 12px;
            font-size: 16px;
            cursor: pointer;
            margin-left: 20px;
            border-radius: 5px;
        }
        header form button:hover {
            background: linear-gradient(90deg, #ff7777, #ff5555);
        }
        .cart-icon {
            margin-right: 8px;
            font-size: 18px;
            color: white;
        }
        @media (max-width: 600px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }
            header nav {
                flex-direction: column;
                align-items: flex-start;
            }
            header nav a, header form button {
                margin: 10px 0 0 0;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <h1><a href="/" style="color:white;">Vegetable</a></h1>
        <nav>
            @auth
                <a href="{{ route('cart') }}"><i class="fas fa-shopping-cart cart-icon"></i></a>
                <a href="{{ route('profile',['id'=>auth()->user()->id]) }}">{{ auth()->user()->name }}</a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            @else
                <a href="/register">Register</a>
                <a href="/login">Login</a>
            @endauth
        </nav>
    </header>
    @yield('content')
</body>
</html>
