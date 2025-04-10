<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Bài đăng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 30px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            color: #007BFF;
            font-weight: bold;
        }

        label {
            font-size: 16px;
            margin-bottom: 5px;
            display: inline-block;
        }

        input, textarea, button {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
            resize: vertical;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #007BFF;
        }

        button {
            background-color: #28a745;
            color: white;
            border: none;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            color: #007BFF;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        a:hover {
            text-decoration: underline;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chỉnh sửa Bài đăng</h1>

        <!-- Form chỉnh sửa bài viết -->
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- ID -->
            <div class="form-group">
                <label for="id">ID:</label>
                <input type="text" id="id" name="id" value="{{ $post->id }}" readonly>
            </div>

            <!-- Tiêu đề -->
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" required>
            </div>

            <!-- Nội dung -->
            <div class="form-group">
                <label for="content">Nội dung:</label>
                <textarea id="content" name="content" required>{{ $post->content }}</textarea>
            </div>

            <button type="submit">Lưu thay đổi</button>
        </form>

        <!-- Nút quay lại danh sách bài viết -->
        <a href="{{ route('posts.index') }}">Quay lại danh sách</a>
    </div>
</body>
</html>
