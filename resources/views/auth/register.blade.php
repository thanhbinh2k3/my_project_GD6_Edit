<?php
session_start(); // Thêm dòng này ở đầu file
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_project_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Xử lý đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Sử dụng prepared statement để tránh lỗi SQL Injection
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, role, remember_token, created_at, updated_at) VALUES (?, ?, ?, ?, NULL, NOW(), NOW())");
    $stmt->bind_param("ssss", $name, $email, $password, $role);

    if ($stmt->execute()) {
        echo "Tạo tài khoản thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #00bfff, #ff00ff); /* Hai màu pha trộn */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;  /* Chiều cao của body chiếm toàn bộ cửa sổ trình duyệt */
            margin: 0;
            padding: 20px; /* Tạo khoảng cách giữa container và mép của màn hình */
        }

        .container {
            background-color: #fff;
            padding: 40px;  /* Giảm padding để container nhỏ hơn */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 380px;  /* Chiều rộng của container */
            max-width: 90%; /* Đảm bảo container không quá to trên màn hình nhỏ */
            max-height: 90vh;  /* Giới hạn chiều cao tối đa của container, không vượt quá 90% chiều cao cửa sổ */
            overflow: auto;  /* Nếu nội dung vượt quá, sẽ không có thanh cuộn */
        }

        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%; /* Đặt chiều rộng cho tất cả các input và select */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="checkbox"] {
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a52d8;
        }

        .terms {
            display: block;
            text-align: center;
            margin: 10px 0;
            font-size: 15px;
        }

        .terms a {
            color: #6c63ff;
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .back-button {
            background-color: #ccc; /* Màu nền cho nút quay lại */
            color: black; /* Màu chữ cho nút quay lại */
            margin-top: 10px; /* Khoảng cách trên nút quay lại */
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f3f3f3, #ccc);
            margin: 0 auto 20px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .avatar:hover {
            transform: scale(1.1);
        }


        h2 {
            text-align: center;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%; /* Đặt chiều rộng cho tất cả các input và select */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="checkbox"] {
            margin: 10px 0;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #6c63ff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #5a52d8;
        }

        .terms {
            display: block;
            text-align: center;
            margin: 10px 0;
            font-size: 15px;
        }

        .terms a {
            color: #6c63ff;
            text-decoration: none;
        }

        .terms a:hover {
            text-decoration: underline;
        }

        .back-button {
            background-color: #ccc; /* Màu nền cho nút quay lại */
            color: black; /* Màu chữ cho nút quay lại */
            margin-top: 10px; /* Khoảng cách trên nút quay lại */
        }

        .avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f3f3f3, #ccc);
            margin: 0 auto 20px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .avatar:hover {
            transform: scale(1.1);
        }
    </style>
    <script>
        // JavaScript để hiển thị/ẩn mật khẩu khi checkbox được tích chọn
        function togglePasswordVisibility() {
            var password = document.getElementById("password");
            var passwordConfirmation = document.getElementById("password_confirmation");
            var checkbox = document.getElementById("show-password");

            if (checkbox.checked) {
                password.type = "text"; // Hiển thị mật khẩu
                passwordConfirmation.type = "text"; // Hiển thị mật khẩu xác nhận
            } else {
                password.type = "password"; // Ẩn mật khẩu
                passwordConfirmation.type = "password"; // Ẩn mật khẩu xác nhận
            }
        }
    </script>
</head>
<body>

<div class="container">
    <div class="login-form">
        <div class="avatar">
            <img src="{{ asset('images/chatbot_dt.png') }}" alt="Chatbot Avatar" style="width: 100%; height: 100%; border-radius: 50%;">
        </div>
        <h2>Sign Up</h2>
        @if(session('status'))
            <div class="alert alert-success" style="color: green;">
                {{ session('status') }}
            </div>
        @endif

        @if($errors->has('email'))
            <div class="alert alert-danger" style="color: red;">
                {{ $errors->first('email') }}
            </div>
        @endif

        @if($errors->has('email'))
            <div id="email-error" class="alert alert-danger" style="color: red;">
                {{ $errors->first('email') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('email-error').style.display = 'none';
                }, 2000); // 2 giây
            </script>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf <!-- CSRF Token để bảo vệ form -->
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" required>
            <br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <br>

            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="password_confirmation">Password Again:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            <br>
            
            <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()"> Show Password
            <br><br>
            <button type="submit">Register</button>
            <br><br>
            <button type="button" class="back-button" onclick="window.location.href='{{ url('/') }}'">Quay lại</button>
        </form>

    <br>
    <p class="terms">Already a member? <a href="http://127.0.0.1:8000/login">Login here</a></p>
</div>

</body>
</html>