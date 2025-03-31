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

// Xử lý đăng ký
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);  // Mã hóa mật khẩu

    $sql = "INSERT INTO users_2 (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Tạo tài khoản thành công!";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
</head>
<body>
    <h2>Đăng ký tài khoản</h2>
    <form method="POST" action="register.blade.php">
        <label for="name">Họ và tên:</label>
        <input type="text" id="name" name="name" placeholder="Nhập tên của bạn" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
        <br><br>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
        <br><br>
        <button type="submit">Đăng ký</button>
    </form>
    <br>
    <a href="login.blade.php">Đã có tài khoản? Đăng nhập</a>
</body>
</html>
