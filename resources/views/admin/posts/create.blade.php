<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Bài Viết Mới</title>
</head>
<body>
    <h1>Tạo Bài Viết Mới</h1>

    <!-- Hiển thị thông báo thành công -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content" rows="4" required></textarea><br><br>

        <label for="category">Danh mục:</label><br>
        <input type="text" id="category" name="category" required><br><br>

        <button type="submit">Lưu bài viết</button>
    </form>

    <br>
    <a href="{{ url('/') }}">Quay lại danh sách</a>
</body>
</html>
