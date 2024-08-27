@extends('header')

@section('title', 'Profile')

@section('content')
    <style>
        /* Scoped styles for the profile page */
        .profile-container {
            background: linear-gradient(135deg, #1e3c72, #2a5298, #3a7bd5, #00d2ff);
            font-family: 'Arial', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 91.3vh;
        }

        .profile-container form {
            background: linear-gradient(135deg, #ffffff, #e0e0e0);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .profile-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            color: #fff;
            background: linear-gradient(135deg, #ff7e5f, #feb47b);
            padding: 15px;
            border-radius: 5px;
        }

        .profile-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .profile-container input[type="text"],
        .profile-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            appearance: none;
        }

        .profile-container input[type="text"]::placeholder {
            color: #777;
        }

        .profile-container select {
            color: #555;
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .profile-container button[type="submit"],
        .profile-container button[type="button"] {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .profile-container button[type="submit"] {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            color: white;
        }

        .profile-container button[type="button"] {
            background: linear-gradient(135deg, #7f7fd5, #86a8e7, #91eae4);
            color: white;
            margin-top: 15px;
        }

        .profile-container button:hover {
            opacity: 0.85;
        }

        /* Responsive Design */
        @media (max-width: 500px) {
            .profile-container form {
                padding: 15px;
            }

            .profile-container h2 {
                font-size: 20px;
            }

            .profile-container input[type="text"],
            .profile-container select,
            .profile-container button {
                font-size: 14px;
                padding: 10px;
            }
        }
    </style>

    <div class="profile-container">
        <form action="/profile" method="POST">
            @csrf
            <h2>Profile Information</h2>
            <label for="gender">Gender</label>
            <select name="gender" id="gender">
                <option value="" disabled selected>Select your gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            <a href="{{ route('adress') }}"><button type="button">View Address</button></a>
            <button type="submit">Submit</button>
        </form>
    </div>
@endsection
