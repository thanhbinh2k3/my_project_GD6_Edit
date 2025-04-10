<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function editProfile()
    {
        return view('user.edit_profile');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Cập nhật thành công!');
    }

    public function changePassword()
    {
        return view('user.change_password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Đổi mật khẩu thành công!');
    }
}
