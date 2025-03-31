<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Quản Lý</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <h1>Chào mừng đến với trang quản lý</h1>

    <div class="container">
        <h2>Quản lý</h2>
        <ul>
            <li><a href="{{ route('manage.users') }}">Quản lý người dùng</a></li>
            <li><a href="{{ route('manage.pages') }}">Quản lý trang</a></li>
            <li><a href="{{ route('manage.posts') }}">Quản lý bài viết</a></li>
            <li><a href="{{ route('manage.files') }}">Quản lý thư viện</a></li>
        </ul>
    </div>

    <!-- Form upload file -->
    <h2>Upload File</h2>
    <form action="{{ route('file.upload') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Chọn tệp:</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Tải lên</button>
    </form>

</body>
</html>
