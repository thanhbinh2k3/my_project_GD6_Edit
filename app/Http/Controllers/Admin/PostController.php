<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller {
    // Hiển thị danh sách bài viết
    public function index() {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    // Hiển thị form tạo bài viết mới
    public function create() {
        return view('admin.posts.create');
    }

    // Lưu bài viết mới vào CSDL
    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được tạo!');
    }

    // Hiển thị form chỉnh sửa bài viết
    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('admin.posts.edit', compact('post'));
    }

    // Cập nhật bài viết
    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được cập nhật!');
    }

    // Xóa bài viết
    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Bài viết đã được xóa!');
    }
}
