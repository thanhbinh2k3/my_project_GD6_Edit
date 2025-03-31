<?php
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

    $sql = "SELECT * FROM users_2 WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Kiểm tra mật khẩu
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Đăng nhập thành công, chuyển hướng đến trang chủ
            header('Location: /home'); // Hoặc route tương ứng mà bạn đã định nghĩa
            exit(); // Dừng script để không tiếp tục xử lý
        } else {
            echo "Mật khẩu sai!";
        }
    } else {
        echo "Email không tồn tại!";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            background-color: #d4cfc4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 400px; /* Adjusted width here */
        }

        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #f0f0f0;
            margin: 0 auto 20px;
        }

        input {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            display: block; 
            padding: 10px;
            background-color: #a58c7d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 80%; 
            margin: 10px auto; 
        }

        button:hover {
            background-color: #8e6e5a;
        }

        label {
            display: block;
            text-align: left;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-form">
            <div class="avatar"></div>
            <h2>Admin Login</h2>
            <form method="POST" action="{{ url('/login') }}">
                @csrf
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>

                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" placeholder="*******" required>

                <button type="submit">Login</button>
            </form>
            <p><a href="#">Forgot Password? Click to reset</a></p>
        </div>
    </div>
</body>
</html>
