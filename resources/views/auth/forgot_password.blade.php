<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quên Mật Khẩu</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            position: relative; /* Để sử dụng cho lớp phủ */
            overflow: hidden; /* Ngăn chặn cuộn trang */
        }
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('/images/forget_pw.jpg'); /* Thay đổi background bằng hình ảnh */
            background-size: cover; /* Đảm bảo hình ảnh phủ kín toàn bộ */
            background-position: center; /* Căn giữa hình ảnh */
            opacity: 0.15; /* Độ mờ của hình nền */
            z-index: -1; /* Đặt lớp phủ phía sau nội dung */
        }
        h1 {
            margin-bottom: 20px;
            color: black; /* Thay đổi màu chữ nếu cần */
        }
        .form-container {
            border: 2px solid black; /* Đường viền màu đen */
            padding: 20px;
            border-radius: 10px; /* Bo góc cho khung */
            background-color: rgba(249, 249, 249, 0.8); /* Màu nền cho khung với độ trong suốt */
        }
        table {
            margin: 0 auto; /* Căn giữa bảng */
        }
        td {
            padding: 10px; /* Khoảng cách giữa các ô */
        }
        button {
            margin-top: 10px;
        }
        .back-button {
            margin: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
        .back-button-2 {
            margin: 20px;
            padding: 10px 20px;
            background-color: rgb(255, 0, 0);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .back-button-2:hover {
            background-color: rgb(214, 0, 0);
        }
        #h1_form {
            text-align: center;
        }
        .error-message {
            color: red; /* Màu đỏ cho thông báo lỗi */
            margin-bottom: 10px; /* Khoảng cách dưới thông báo lỗi */
        }
        .success-message {
            color: green; /* Màu xanh lá cho thông báo thành công */
            margin-bottom: 10px; /* Khoảng cách dưới thông báo thành công */
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1 id="h1_form">Quên Mật Khẩu</h1>

         <!-- Hiển thị thông báo lỗi nếu có -->
         @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Hiển thị thông báo thành công nếu có -->
        @if (session('status'))
            <div class="success-message">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <table>
                <tr>
                    <td><label for="name">Tên đăng nhập:</label></td>
                    <td><input type="text" name="name" id="name" required></td> <!-- Sử dụng 'name' -->
                </tr>
                <tr>
                    <td><label for="password">Mật khẩu mới:</label></td>
                    <td><input type="password" name="password" id="password" required></td> <!-- Thay đổi từ 'new_password' thành 'password' -->
                </tr>
                <tr>
                    <td><label for="password_confirmation">Xác nhận mật khẩu mới:</label></td>
                    <td><input type="password" name="password_confirmation" id="password_confirmation" required></td> <!-- Đảm bảo xác nhận mật khẩu -->
                </tr>
            </table>
            <table>
                <tr>
                    <td><button type="submit" class="back-button-2">Cập nhật mật khẩu</button></td>
                    <td><a href="http://127.0.0.1:8000/login" class="back-button">Quay lại</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>