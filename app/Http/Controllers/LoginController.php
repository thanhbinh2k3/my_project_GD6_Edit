<?php

// app/Http/Controllers/LoginController.php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Sử dụng đúng model

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLogin()
    {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            return redirect()->route('home'); // Nếu đã đăng nhập, chuyển đến trang home
        }

        return view('auth.login'); // Nếu chưa đăng nhập, hiển thị trang login
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email', // Thay đổi nullable thành required
            'password' => 'required', // Thay đổi nullable thành required
            'role' => 'required|in:admin,user', // Kiểm tra role
        ]);

        // Lấy user theo email và role
        $user = User::where('email', $request->email)
                    ->where('role', $request->role) // Kiểm tra role trong bảng users
                    ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::guard('web')->login($user); // Đăng nhập người dùng

            // Lưu email vào session
            $request->session()->put('email', $request->email); // Lưu email vào session
            $request->session()->flash('status', "Đăng nhập thành công với tài khoản: {$request->email}"); // Thông báo thành công

            // Chuyển hướng dựa trên vai trò
            if ($user->role === 'admin') {
                return redirect()->route('home')->with('status', 'Đăng nhập thành công!'); // Trang chủ admin
            } else {
                return redirect()->route('user_home')->with('status', 'Đăng nhập thành công!'); // Trang chủ user
            }
        }

        return back()->withErrors(['email' => 'Email hoặc mật khẩu không đúng']); // Thông báo lỗi đăng nhập thất bại
    }

    // Đăng xuất
    public function logout()
    {
        Auth::guard('web')->logout(); // Đăng xuất người dùng
        return redirect()->route('login')->with('status', 'Đăng xuất thành công!'); // Thông báo đăng xuất thành công
    }
}