<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bài đăng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: left;
            color: #333;
            font-weight: bold; /* Thêm font bold */
            font-size: 20px;   /* Thêm kích thước chữ 18px */
        }

        h2 {
            text-align: center;
            color: #333;
            font-weight: bold; /* Thêm font bold */
            font-size: 18px;   /* Thêm kích thước chữ 18px */
        }


        a {
            text-decoration: none;
            color: #007BFF;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            padding: 50px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #eaeaea;
        }

        td a {
            color: #007BFF;
        }

        td a:hover {
            text-decoration: underline;
        }

        .actions button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .actions button:hover {
            background-color: #c82333;
        }

        .actions a {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
        }

        .actions a:hover {
            background-color: #218838;
        }

        .no-posts {
            text-align: center;
            font-size: 18px;
            color: #888;
        }
    </style>
</head>
<body>
    <h1>Quản lý Bài đăng</h1>
    <div class="container">
        <a href="{{ route('posts.create') }}">Tạo bài viết mới</a>

        <h2>Danh sách bài viết</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($posts) && $posts->count() > 0)
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ Str::limit($post->content, 100) }}</td>
                            <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                            <td>{{ $post->updated_at->format('d/m/Y H:i') }}</td>
                            <td class="actions">
                                <a href="{{ route('posts.edit', $post->id) }}">Chỉnh sửa</a> |
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="6" class="no-posts">Không có bài viết nào!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
