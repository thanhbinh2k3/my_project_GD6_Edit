<?php

namespace App\Http\Controllers\Admin;
use App\Models\Plan;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\User;
use App\Http\Controllers\Controller;

class DashboardController_2 extends Controller
{
    public function index()
    {

        // Lấy dữ liệu thống kê
        $usersCount = User::count();
        //dd($usersCount);
        $postsCount = Post::count();
        $stylesCount = Image::count();
        $packagesCount = Plan::count();

        // Trả về view với dữ liệu
        return view('admin.dashboard', compact('usersCount', 'postsCount', 'stylesCount', 'packagesCount'));
    }
}