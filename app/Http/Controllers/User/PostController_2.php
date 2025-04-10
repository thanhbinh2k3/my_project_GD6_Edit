<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PostController_2 extends Controller
{
    public function index()
    {
        $posts = DB::table('posts')->latest()->get(); // hoặc Post::latest()->get() nếu bạn dùng Eloquent
        return view('user.posts.index_2', compact('posts'));
    }
}

