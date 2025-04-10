<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin cá nhân</title>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            background: linear-gradient(to right, #f8fbff, #eef1f7);
        }

        body {
            display: flex;
            flex-direction: column;
        }

        header {
            background: linear-gradient(90deg, #deeaff, #f3f7ff);
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
            border-bottom: 1px solid #ccc;
        }

        h2 {
            margin: 0;
            color: #2b2d42;
        }

        .header-buttons button {
            margin-left: 12px;
            padding: 10px 18px;
            background-color: #5c7cfa;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .header-buttons button:hover {
            background-color: #4c6ef5;
            transform: translateY(-2px);
        }

        .main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .post-container {
            max-width: 800px;
            width: 100%;
            background-color: #fff;
            padding: 80px;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
            animation: fadeIn 0.8s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .post-container h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 30px;
        }

        .post-container p {
            font-size: 18px;
            color: #444;
            margin-bottom: 15px;
            padding-left: 10px;
            border-left: 4px solid #74c0fc;
        }

        footer {
            background: #f1f3f5;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 30px 20px;
            font-size: 0.95rem;
            border-top: 1px solid #ccc;
        }

        .footer-section {
            display: flex;
            gap: 14px;
            max-width: 300px;
            margin: 10px 0;
        }

        .footer-section img {
            width: 48px;
            height: 48px;
        }

        .footer-section div strong {
            display: block;
            font-size: 1rem;
            color: #222;
            margin-bottom: 4px;
        }

        .footer-section div p {
            margin: 0;
            line-height: 1.4;
            color: #555;
        }

        form button[type="submit"] {
            background-color: #f03e3e;
        }

        form button[type="submit"]:hover {
            background-color: #c92a2a;
        }

        button i {
            margin-right: 6px;
        }

        .profile-actions {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
            flex-wrap: wrap;
        }

        .profile-actions button {
            padding: 12px 20px;
            font-size: 15px;
            background-color: #1c7ed6;
            color: #fff;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .profile-actions button:hover {
            background-color: #1971c2;
            transform: translateY(-2px);
        }

        .profile-actions button i {
            margin-right: 8px;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <h2>🎨 Nhận dạng trường phái hội hoạ</h2>
        <div class="header-buttons">
            <button onclick="window.location.href='http://127.0.0.1:8000/user_home'">
                <i class="fas fa-home"></i> Trang chủ
            </button>
            <button onclick="window.location.href='{{ route('user.predict') }}'">
                <i class="fas fa-magic"></i> Dự đoán
            </button>
            <button onclick="window.location.href='{{ route('user.posts.index_2') }}'">
                <i class="fas fa-newspaper"></i> Bài đăng
            </button>
            <button onclick="window.location.href='{{ route('user.profile') }}'">
                <i class="fas fa-user"></i> Cá nhân
            </button>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit"><i class="fas fa-sign-out-alt"></i> Đăng xuất</button>
            </form>
        </div>
    </header>

    <!-- Nội dung -->
    <main class="main">
        <div class="post-container">
            <h1>Thông tin cá nhân</h1>
            <p>👤 Họ tên: {{ Auth::user()->name }}</p>
            <p>📧 Email: {{ Auth::user()->email }}</p>
            <div class="profile-actions">
                <button onclick="window.location.href='{{ route('user.edit_profile') }}'">
                    <i class="fas fa-user-edit"></i> Chỉnh sửa hồ sơ
                </button>
                <button onclick="window.location.href='{{ route('user.change_password') }}'">
                    <i class="fas fa-key"></i> Đổi mật khẩu
                </button>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-section">
            <img src="{{ asset('ai.png') }}" alt="AI Icon">
            <div>
                <strong>Hệ thống AI Hội hoạ</strong>
                <p>Khám phá trường phái hội hoạ chỉ với một bức ảnh.</p>
            </div>
        </div>
        <div class="footer-section">
            <img src="{{ asset('contact.png') }}" alt="Contact Icon">
            <div>
                <strong>Liên hệ</strong>
                <p>Email: support@hoia.ai<br>Hotline: 0123 456 789</p>
            </div>
        </div>
        <div class="footer-section">
            <img src="{{ asset('info.png') }}" alt="Info Icon">
            <div>
                <strong>Thông tin</strong>
                <p>Phiên bản 1.0<br>&copy; 2025 AI Art Style</p>
            </div>
        </div>
    </footer>

</body>
</html>
