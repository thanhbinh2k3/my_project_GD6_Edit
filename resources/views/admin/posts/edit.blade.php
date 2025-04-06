<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Bài đăng</title>
</head>
<body>
    <h1>Chỉnh sửa Bài đăng</h1>

    <!-- Form chỉnh sửa bài viết -->
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Tiêu đề:</label><br>
        <input type="text" id="title" name="title" value="{{ $post->title }}" required><br><br>

        <label for="category">Danh mục:</label><br>
        <input type="text" id="category" name="category" value="{{ $post->category }}" required><br><br>

        <label for="content">Nội dung:</label><br>
        <textarea id="content" name="content" rows="5" required>{{ $post->content }}</textarea><br><br>

        <label for="status">Trạng thái:</label><br>
        <select id="status" name="status">
            <option value="Nháp" {{ $post->status == 'Nháp' ? 'selected' : '' }}>Nháp</option>
            <option value="Công khai" {{ $post->status == 'Công khai' ? 'selected' : '' }}>Công khai</option>
            <option value="Ẩn" {{ $post->status == 'Ẩn' ? 'selected' : '' }}>Ẩn</option>
        </select><br><br>

        <button type="submit">Lưu thay đổi</button>
    </form>

    <!-- Nút quay lại danh sách bài viết -->
    <a href="{{ route('posts.index_2') }}">Quay lại danh sách</a>
</body>
</html>
