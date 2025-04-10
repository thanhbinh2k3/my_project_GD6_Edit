<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật Bài đăng</title>
</head>
<body>
    <h1>Cập nhật Bài đăng</h1>

    <p>Bài viết <strong>{{ $post->title }}</strong> đã được cập nhật thành công!</p>
    <p>Nội dung mới: {{ $post->content }}</p>
    <p>Ngày cập nhật: {{ $post->updated_at->format('d/m/Y H:i') }}</p>

    <a href="{{ route('posts.index') }}">Quay lại danh sách bài viết</a>
    <br>
    <a href="{{ route('posts.edit', $post->id) }}">Chỉnh sửa lại</a>
</body>
</html>
