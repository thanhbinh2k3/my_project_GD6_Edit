<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hệ thống nhận dạng trường phái hội hoạ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            background-color: #fefefe;
            color: #333;
        }

        header, footer {
            background: linear-gradient(to right, #f0f4ff, #e6e9f0);
            padding: 15px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        h2 {
            margin: 0;
            font-size: 1.6rem;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
        }

        .header-buttons button {
            margin-left: 12px;
            padding: 8px 14px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .header-buttons button:hover {
            background-color: #357abd;
        }

        .main-content {
            padding: 50px 20px;
            text-align: center;
            background: #fafafa;
            animation: fadeIn 0.7s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .main-content img {
            max-width: 600px;
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            margin: 20px 0;
            transition: transform 0.3s ease;
        }

        .main-content img:hover {
            transform: scale(1.02);
        }

        .search-box {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .search-box input {
            padding: 10px 14px;
            width: 300px;
            max-width: 90%;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 1rem;
            transition: box-shadow 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }

        .search-box button {
            padding: 10px 16px;
            background-color: #4caf50;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .search-box button:hover {
            background-color: #3e8e41;
        }

        footer {
            background: #e7eaf1;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 30px 20px;
            font-size: 0.95rem;
            border-top: 1px solid #ccc;
        }

        .footer-section {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            max-width: 300px;
            margin: 10px 0;
        }

        .footer-section img {
            width: 48px;
            height: 48px;
        }

        .footer-section div strong {
            display: block;
            margin-bottom: 4px;
            font-size: 1rem;
            color: #222;
        }

        .footer-section div p {
            margin: 0;
            line-height: 1.4;
        }

        button {
            background-color: #3490dc;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 16px;
        }

        button:hover {
            background-color: #2779bd;
            transform: scale(1.05);
        }
        
        button i {
            margin-right: 5px;
        }
    </style>
</head>
<body>
<div class="page-container">

    <!-- Header -->
    <header>
        <div><h2>🎨 Nhận dạng trường phái hội hoạ</h2></div>
        <div class="header-buttons">
            <button onclick="window.location.href='{{ route('user.predict') }}'">
                <i class="fas fa-magic"></i> Dự đoán
            </button>

            <button onclick="window.location.href='{{ route('user.posts.index_2') }}'">
                <i class="fas fa-newspaper"></i> Bài đăng từ Admin
            </button>

            <button onclick="window.location.href='{{ route('user.profile') }}'">
                <i class="fas fa-user"></i> Thông tin cá nhân
            </button>
            <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit">Đăng xuất</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <div class="search-box">
            <input type="text" placeholder="🔍 Tìm kiếm tranh hoặc trường phái...">
            <button>Tìm kiếm</button>
        </div>
        <h3>🎨 Hệ thống nhận dạng trường phái hội hoạ từ ảnh</h3>
        <img src="{{ asset('art_img.jpg') }}" alt="Demo art image">
        <p>
            Hệ thống sử dụng trí tuệ nhân tạo để nhận dạng trường phái của bức tranh qua ảnh chụp,<br>
            hỗ trợ người dùng khám phá và tìm hiểu sâu hơn về nghệ thuật hội hoạ.
        </p>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-section">
            <img src="{{ asset('ai.png') }}" alt="Logo">
            <div>
                <strong>Hệ thống AI Hội hoạ</strong>
                <p>Khám phá trường phái hội hoạ chỉ với một bức ảnh.</p>
            </div>
        </div>
        <div class="footer-section">
            <img src="{{ asset('contact.png') }}" alt="Contact">
            <div>
                <strong>Liên hệ</strong>
                <p>Email: support@hoia.ai<br>Hotline: 0123 456 789</p>
            </div>
        </div>
        <div class="footer-section">
            <img src="{{ asset('info.png') }}" alt="Info">
            <div>
                <strong>Thông tin</strong>
                <p>Phiên bản 1.0<br>&copy; 2025 AI Art Style</p>
            </div>
        </div>
    </footer>

</div>
</body>

</html>
