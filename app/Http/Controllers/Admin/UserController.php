<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User; // Thêm dòng này để import User model
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Lấy tất cả người dùng từ database
        return view('admin.users.index', compact('users')); // Trả về view với biến $users
    }
}
