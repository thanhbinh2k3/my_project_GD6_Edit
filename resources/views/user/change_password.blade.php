<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="main">
        <div class="post-container">
            <h1>Đổi mật khẩu</h1>
            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('user.update_password') }}" method="POST">
                @csrf
                <label>Mật khẩu hiện tại:</label><br>
                <input type="password" name="current_password" required><br><br>

                <label>Mật khẩu mới:</label><br>
                <input type="password" name="new_password" required><br><br>

                <label>Nhập lại mật khẩu mới:</label><br>
                <input type="password" name="new_password_confirmation" required><br><br>

                <button type="submit">Cập nhật mật khẩu</button>
            </form>
            <br>
            <a href="{{ route('user.profile') }}">← Quay lại</a>
        </div>
    </div>
</body>
</html>
