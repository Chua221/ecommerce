<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298, #3a7bd5, #00d2ff);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        form {
            background: linear-gradient(135deg, #ffffff, #e0e0e0);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px;
            color: #333;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            padding: 15px;
            border-radius: 5px;
            color: white;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        }

        input::placeholder {
            color: #777;
        }

        p {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
            transition: opacity 0.3s ease;
        }

        input[type="submit"]:hover {
            opacity: 0.85;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            form {
                padding: 15px;
            }

            h1 {
                font-size: 24px;
            }

            input[type="email"], input[type="password"], input[type="submit"] {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    @if(session('message'))
        <script>
            window.alert('{{ session("message") }}');
        </script>
    @endif

    <form action="/login" method="POST">
        @csrf
        <h1>Login Page</h1>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
        @error('email')
            <p>{{ $message }}</p>
        @enderror
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter Your Password" required>
        @error('password')
            <p>{{ $message }}</p>
        @enderror
        
        <input type="submit" value="Login">
    </form>
</body>
</html>
