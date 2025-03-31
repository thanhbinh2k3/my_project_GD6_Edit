<?php

// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLogin()
    {
        return view('auth.login'); // Nếu file của bạn nằm trong thư mục "auth"
    }


    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user); // Đăng nhập người dùng
            return redirect()->route('home');  // Chuyển hướng đến trang chủ sau khi đăng nhập thành công
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']);
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout(); // Đăng xuất người dùng
        return redirect()->route('login');  // Chuyển hướng về trang đăng nhập
    }
}


