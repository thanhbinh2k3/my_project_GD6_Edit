<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .button {
            padding: 8px 12px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            color: white;
            cursor: pointer;
        }
        .create {
            background-color: #4CAF50; /* Green */
        }
        .view {
            background-color: #2196F3; /* Blue */
        }
        .edit {
            background-color: #ff9800; /* Orange */
        }
        .delete {
            background-color: #f44336; /* Red */
        }
    </style>
</head>
<body>
    <h1>User List</h1>
    <a href="{{ route('user.create') }}">
        <button class="button create">Create New User</button>
    </a>
    
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->role) }}</td>
                    <td>
                        <a href="{{ route('user.show', $user->id) }}" class="button view load-page" data-url="{{ route('user.show', $user->id) }}">View</a>
                        <a href="{{ route('user.edit', $user->id) }}">
                            <button class="button edit">Edit</button>
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>