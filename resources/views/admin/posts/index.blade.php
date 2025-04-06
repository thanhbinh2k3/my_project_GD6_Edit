<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bài đăng</title>
</head>
<body>
    <h1>Quản lý Bài đăng</h1>

    <!-- Liên kết đến trang tạo bài viết mới -->
    <a href="{{ route('posts.create') }}">Tạo bài viết mới</a>

    <!-- Liệt kê các bài viết đã có -->
    <h2>Danh sách bài viết</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>
        @if(isset($posts))
            <p>Dữ liệu đã load thành công</p>
        @endif
        <tbody>
        @if(isset($posts) && $posts->count() > 0)
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->status }}</td>
                        <td>
                            <a href="{{ route('posts.edit', $post->id) }}">Chỉnh sửa</a> |
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Xóa</button>
                            </form>
                            @if (auth()->user() && auth()->user()->role == 'admin')
                                | <a href="{{ route('posts.approve', $post->id) }}">Duyệt</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5">Không có bài viết nào!</td>
                </tr>
            @endif
        </tbody>

    </table>
</body>
</html>

