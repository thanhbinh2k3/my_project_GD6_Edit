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

// Xử lý đăng nhập
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role']; // Lấy role từ form
    $rememberMe = isset($_POST['rememberMe']); // Kiểm tra checkbox "Nhớ tài khoản"

    // Lấy user theo email
    $sql = "SELECT * FROM users WHERE email = '$email' AND role = '$role'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Đăng nhập thành công
            if ($role == "admin") {
                $_SESSION['message'] = "Đăng nhập thành công!";
                header('Location: /home'); // Trang admin
            } else {
                $_SESSION['message'] = "Đăng nhập thành công!";
                header('Location: /user_home'); // Trang user, bạn có thể sửa route theo hệ thống
            }
            exit();
        } else {
            $_SESSION['error'] = "Mật khẩu sai!";
        }
    } else {
        $_SESSION['error'] = "Email hoặc role không đúng!";
    }

    // Lưu thông tin "Nhớ tài khoản" vào session
    if ($rememberMe) {
        $_SESSION['rememberMe'] = true;
        $_SESSION['message'] = "Bạn đã chọn 'Nhớ tài khoản'.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <style>
        body {
            background: linear-gradient(135deg, #0080ff 50%, #ec1313 50%);
            display: flex;
            align-items: center;  /* Căn giữa theo chiều dọc */
            justify-content: center;  /* Căn giữa theo chiều ngang */
            height: 100vh;  /* Chiều cao của body chiếm toàn bộ cửa sổ trình duyệt */
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login-container {
            background: white;
            border-radius: 16px;
            padding: 40px 30px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
            text-align: center;
            width: 400px;
            max-height: 80vh;  /* Giới hạn chiều cao tối đa của login-container */
            overflow: auto;  /* Nếu nội dung vượt quá max-height, sẽ có thanh cuộn */
            animation: fadeIn 1s ease-in-out;
            margin-top: 15px;  /* Đảm bảo có khoảng cách phía trên */
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .alert-success {
            background-color: #4CAF50;
            color: white;
        }

        .alert-success-2 {
            background-color: #0066ff;
            color: white;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .alert-error {
            background-color: #f44336;
            color: white;
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
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            text-align: left;
            margin: 10px 0 0px;
            font-weight: 500;
            color: #555;
        }

        #role {
            width: 98%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border 0.3s, box-shadow 0.3s;
        }

        input {
            width: 95%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            transition: border 0.3s, box-shadow 0.3s;
        }

        input:focus {
            border-color: #a58c7d;
            box-shadow: 0 0 8px rgba(165, 140, 125, 0.4);
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background: #a58c7d;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s, transform 0.2s;
            margin-top: 10px;
        }

        button:hover {
            background: #8e6e5a;
            transform: scale(1.03);
        }

        .back-button {
            background: #e0e0e0;
            color: #333;
        }

        .back-button:hover {
            background: #d1d1d1;
        }

        a {
            display: inline-block;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #a58c7d;
        }

    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
        <div class="avatar">
            <img src="{{ asset('images/chatbot_dt.png') }}" alt="Chatbot Avatar" style="width: 100%; height: 100%; border-radius: 50%;">
        </div>
            <h2>Form Login</h2>
            <!-- Hiển thị thông báo thành công hoặc lỗi -->
            @if(session('status'))
                <div class="alert alert-success" role="alert" id="status-message">
                    {{ session('status') }}
                </div>
                <script>
                    // Ẩn thông báo sau 2 giây
                    setTimeout(function() {
                        var message = document.getElementById('status-message');
                        if (message) {
                            message.style.display = 'none';
                        }
                    }, 2000); // 2000ms = 2 giây
                </script>
            @endif
            
            @if(session('message'))
                <div class="alert alert-success-2" role="alert" id="status-message">
                    {{ session('message') }}
                </div>
                <script>
                    // Ẩn thông báo sau 2 giây
                    setTimeout(function() {
                        var message = document.getElementById('status-message');
                        if (message) {
                            message.style.display = 'none';
                        }
                    }, 2000); // 2000ms = 2 giây
                </script>
            @endif


            @if(session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('rememberMe'))
                <div class="alert alert-success-2">
                    {{ session('message') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf <!-- Thêm CSRF token -->
                <label for="email">Email:</label>
                <br>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Mật khẩu:</label>
                <br>
                <input type="password" id="password" name="password" placeholder="*******" required>

                <label for="role">Vai trò:</label>
                <br>
                <select id="role" name="role" required>
                    <option value="admin">Admin</option>
                    <option value="user">User </option>
                </select>
                <br>

                <table style="width: 100%; font-size: 14px; color: #333; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 5px;">
                            <input type="checkbox" id="rememberMe" style="margin-bottom: 5px;" name="rememberMe">
                        </td>
                        <td style="padding: 5px;">
                            <label for="rememberMe" style="cursor: pointer; margin-bottom: 12px;">Nhớ tài khoản</label>
                        </td>
                        <td style="text-align: right;">
                            <a href="http://127.0.0.1:8000/forgot_password" sty;e="margin-top: 20px; cursor: pointer;">Quên mật khẩu? Nhấn để reset</a>
                        </td>
                    </tr>
                </table>

                <button type="submit">Login</button>
                <br>
                <p>Chưa có tài khoản? <a href="http://127.0.0.1:8000/register">Đăng ký</a></p>
            </form>

        </div>
    </div>
</body>
</html>