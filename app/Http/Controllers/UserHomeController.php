<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserHomeController extends Controller
{
    public function index()
    {
        return view('user_home'); // Trả về view user_home.blade.php
    }
}