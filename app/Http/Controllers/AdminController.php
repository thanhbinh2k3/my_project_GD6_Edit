<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Image;
use App\Models\User;

class AdminController extends Controller
{
    /*public function index()
    {
        if (Auth::user()->role == 'admin') {
            return redirect()->route('login');
        }

        return view('home');
    }*/

    //public function index()
    //{
        //if (Auth::check() && Auth::user()->role == 'admin') {
            //return redirect()->route('admin.dashboard');
        //}

        //return redirect()->route('login');
    //}

    // Trang dashboard của Admin
    public function showDashboard()
    {
        // Kiểm tra người dùng đã đăng nhập và có quyền admin chưa
        if (!Auth::check() || Auth::user()->role != 'admin') {
            return redirect()->route('login');
        }

        // Lấy dữ liệu thống kê
        $usersCount = User::count();
        dd($usersCount);
        $postsCount = Post::count();
        $stylesCount = Image::count();
        $packagesCount = Plan::count();

        // Trả về view với dữ liệu
        return view('admin.dashboard', compact('usersCount', 'postsCount', 'stylesCount', 'packagesCount'));
    }



     // Lưu người dùng mới
     public function store(Request $request)
     {
         $validated = $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|string|email|max:255|unique:users',
             'password' => 'required|string|min:8|confirmed',
         ]);
 
         $user = User::create([
             'name' => $validated['name'],
             'email' => $validated['email'],
             'password' => bcrypt($validated['password']),
         ]);
 
         // Ghi log hoạt động (nếu cần)
         //Activity::create([
         //    'user_id' => auth()->id(),
         //   'action' => 'Tạo người dùng',
         //    'description' => 'Admin đã tạo người dùng "' . $user->name . '"',
         //]);
 
         // Lưu người dùng vào cơ sở dữ liệu
        $user->save();

        // Chuyển hướng người dùng đến một trang khác với thông báo thành công
        return redirect()->route('users.index')->with('success', 'Người dùng đã được tạo thành công!');
     }
}
