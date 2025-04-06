<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    // Hàm hiển thị trang home
    public function index()
    {
        return view('home'); // Trả về view home.blade.php
    }
}
