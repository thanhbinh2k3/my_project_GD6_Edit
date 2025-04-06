<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;  // Thêm dòng này để sử dụng model Post
use Illuminate\Http\Request;

class PostController extends Controller {
    public function index() {
        // Lấy tất cả các bài viết từ cơ sở dữ liệu
        $posts = Post::all(); 

        // Trả về view với dữ liệu bài viết
        return view('admin.posts.index', compact('posts'));
    }

    public function approve($id)
    {
        // Lấy bài viết cần duyệt
        $post = Post::findOrFail($id);

        // Cập nhật trạng thái bài viết thành đã duyệt
        $post->status = 'Duyệt'; // Hoặc trạng thái phù hợp
        $post->save();

        // Chuyển hướng lại trang danh sách bài viết
        return redirect()->route('posts.index')->with('success', 'Bài viết đã được duyệt!');
    }

}


