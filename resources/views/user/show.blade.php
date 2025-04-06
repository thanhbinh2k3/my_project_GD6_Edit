<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show User</title>
</head>
<body>
    <h1>User Details</h1>

    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Joined on: {{ $user->created_at->format('d/m/Y') }}</p>

    <a href="{{ route('home') }}">Back to User List</a>
</body>
</html>
