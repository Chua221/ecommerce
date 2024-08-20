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
    <title>Address</title>
</head>
<body>
    <a href="{{ route('addadress',['id'=>auth()->user()->id]) }}"><button type="button">Add New Address</button></a>
    <table border>
        <tr>
            <th>address1</th>
            <th>address2</th>
            <th>poscode</th>
            <th>city</th>
            <th>state</th>
            <th colspan="2">action</th>
        </tr>
        @foreach ($addressdata as $item)
            <tr>
                <td>{{ $item['adress1'] }}</td>
                <td>{{ $item['adress2'] }}</td>
                <td>{{ $item['poscode'] }}</td>
                <td>{{ $item['city'] }}</td>
                <td>{{ $item['state'] }}</td>
                <td><a href="{{ route('edit',$item['id']) }}"><button type="button">Edit</button></a></td>
                <form action="{{ route('delete',$item['id']) }}" method="POST">   
                    @csrf
                    @method('DELETE')
                    <td><button type="submit">Delete</button></td>
                </form>
            </tr>
        @endforeach
    </table>
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
    color: #333;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100vh;
}

a {
    text-decoration: none;
}

a button[type="button"] {
    display: block;
    margin: 20px auto; /* Centers the button horizontally */
    background-color: #343a40;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

a button[type="button"]:hover {
    opacity: 0.9;
}

table {
    width: 80%;
    border-collapse: collapse;
    margin: 20px auto;
    background-color: #ffffff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #343a40;
    color: #ffffff;
}

tr:hover {
    background-color: #f1f1f1;
}

button {
    padding: 8px 16px;
    margin: 4px 2px;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    background-color:#b7beeb ;
    transition: background-color 0.3 ease;
}

button[type="submit"] {
    background-color: #f44336;
    color: white;
}

button:hover {
    opacity: 0.9;
}

form {
    display: inline;
}

/* Responsive Design */
@media (max-width: 768px) {
    table {
        width: 100%;
    }

    th, td {
        padding: 8px;
    }
}

</style>