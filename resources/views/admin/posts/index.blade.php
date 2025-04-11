<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bài đăng</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #f0f4ff, #ffffff);
            margin: 0;
            padding: 0;
            animation: fade-in 1s ease-in-out;
        }

        @keyframes fade-in {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            padding: 30px;
            color: #2c3e50;
            font-weight: 600;
            font-size: 24px;
        }

        h2 {
            text-align: center;
            color: #34495e;
            font-weight: 600;
            font-size: 20px;
            margin-top: 10px;
        }

        a {
            text-decoration: none;
            color: #3498db;
        }

        a:hover {
            text-decoration: underline;
            color: #2980b9;
        }

        .container {
            width: 90%;
            max-width: 1000px;
            margin: 0 auto 50px;
            padding: 40px;
            background-color: #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            border-radius: 16px;
            animation: fade-in 1s ease-in-out;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        th, td {
            padding: 14px 12px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background-color: #3498db;
            color: white;
            border-radius: 6px 6px 0 0;
        }

        tr:nth-child(even) {
            background-color: #f8faff;
        }

        tr:hover {
            background-color: #ecf5ff;
        }

        td a {
            color: #2980b9;
            font-weight: 500;
        }

        td a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions button,
        .actions a {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            transition: background-color 0.3s ease;
        }

        .actions button:hover {
            background-color: #e74c3c;
        }

        .actions a:hover {
            background-color: #2ecc71;
        }

        .no-posts {
            text-align: center;
            font-size: 18px;
            color: #aaa;
            padding: 20px 0;
        }

        .top-link {
            display: inline-block;
            margin-bottom: 20px;
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 500;
        }

        .top-link:hover {
            background-color: #27ae60;
        }
    </style>
</head>
<body>
    <h1>📋 Quản lý Bài đăng</h1>
    <div class="container">
        <a href="{{ route('posts.create') }}" class="top-link">+ Tạo bài viết mới</a>

        <h2>📚 Danh sách bài viết</h2>
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
                                <a href="{{ route('posts.edit', $post->id) }}">✏️ Sửa</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">🗑️ Xóa</button>
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
