<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('user_home'); // Trả về view user_home.blade.php
    }

    public function profile()
    {
        return view('user.profile'); // Tạo file view resources/views/user/profile.blade.php
    }

    
}