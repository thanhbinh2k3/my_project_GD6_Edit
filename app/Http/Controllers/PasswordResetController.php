<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PasswordResetController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.forgot_password');
    }

    public function sendResetLink(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|string|min:6|confirmed', // Thay đổi từ 'new_password' thành 'password'
        ]);

        // Tìm người dùng theo tên
        $user = User::where('name', $request->name)->first();

        if (!$user) {
            return back()->withErrors(['name' => 'Người dùng không tồn tại!']);
        }

        // Cập nhật mật khẩu
        $user->password = Hash::make($request->password); // Cập nhật mật khẩu mới
        $user->save();

        return redirect()->route('login')->with('status', 'Mật khẩu đã được cập nhật thành công!');
    }
}