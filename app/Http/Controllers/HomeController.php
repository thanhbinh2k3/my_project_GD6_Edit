<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('auth.trang_chu'); // Sử dụng đường dẫn auth.trang_chu
    }
}
