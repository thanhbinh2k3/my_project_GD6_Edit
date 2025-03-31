<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <a href="{{ route('user.create') }}">Create New User</a>

    <ul>
        @foreach($users as $user)
            <li>
                {{ $user->name }} - {{ $user->email }}
                <a href="{{ route('user.show', $user->id) }}">View</a>
                <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
