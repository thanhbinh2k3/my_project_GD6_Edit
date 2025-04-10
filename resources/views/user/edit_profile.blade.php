<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa hồ sơ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="main">
        <div class="post-container">
            <h1>Chỉnh sửa hồ sơ</h1>
            <form action="{{ route('user.update_profile') }}" method="POST">
                @csrf
                <label for="name">Họ tên:</label><br>
                <input type="text" name="name" value="{{ Auth::user()->name }}" required><br><br>
                <button type="submit">Lưu thay đổi</button>
            </form>
            <br>
            <a href="{{ route('user.profile') }}">← Quay lại</a>
        </div>
    </div>
</body>
</html>
