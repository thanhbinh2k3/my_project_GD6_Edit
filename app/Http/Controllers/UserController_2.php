<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // If you have a User model

class UserController_2 extends Controller
{
    // Show a list of users
    public function index()
    {
        $users = User::all(); // Fetch all users
        return view('user.index', compact('users')); // Return the view and pass the users data
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('user.create'); // Return the view for creating a new user
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User created successfully!');
    }

    // Display the specified user
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user')); // Show the user's details
    }

    // Show the form for editing the specified user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user')); // Return the view for editing user
    }

    // Update the specified user in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Optional: update password if provided
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }

    // Remove the specified user from the database
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }
}
