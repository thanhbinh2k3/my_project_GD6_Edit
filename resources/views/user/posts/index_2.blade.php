<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách Bài đăng từ Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to bottom right, #f9fafc, #eef1f7);
            margin: 0;
            padding: 20px;
            color: #333;
            scroll-behavior: smooth;
        }

        header, footer {
            background: linear-gradient(to right, #e3ecff, #d2dfff);
            padding: 15px 30px;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: space-between;
            animation: fadeIn 0.5s ease-in-out;
        }

        .header-buttons button {
            margin-left: 12px;
            padding: 10px 18px;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s ease;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .header-buttons button:hover {
            background-color: #2b74c9;
            transform: translateY(-2px);
        }

        .page-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            animation: fadeIn 1s ease-in-out;
        }

        h2 {
            text-align: center;
            margin: 30px 0 20px;
            color: #2c3e50;
            font-size: 26px;
        }

        .post-container {
            display: flex;
            flex-direction: column;
            gap: 24px;
            max-width: 900px;
            margin: auto;
        }

        .post-card {
            background-color: #ffffff;
            padding: 24px;
            border-radius: 16px;
            border: 1px solid #dcdde1;
            box-shadow: 0 6px 14px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            animation: fadeInUp 0.5s ease both;
        }

        .post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12);
        }

        .post-title {
            font-size: 22px;
            font-weight: bold;
            color: #2980b9;
            margin-bottom: 12px;
        }

        .post-content {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            text-align: justify;
        }

        .post-date {
            font-size: 14px;
            color: #888;
            text-align: right;
            margin-top: 12px;
        }

        .no-posts {
            text-align: center;
            color: #aaa;
            font-size: 18px;
            margin-top: 50px;
            animation: fadeIn 0.7s ease-in;
        }

        footer {
            background: #eef3f9;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 30px 20px;
            font-size: 0.95rem;
            border-radius: 12px;
            margin-top: auto;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.03);
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
            border-radius: 8px;
        }

        .footer-section div strong {
            display: block;
            margin-bottom: 4px;
            font-size: 1rem;
            color: #222;
        }

        .footer-section div p {
            margin: 0;
            line-height: 1.5;
        }

        button {
            background-color: #3490dc;
            color: white;
            padding: 10px 20px;
            margin: 5px;
            border: none;
            border-radius: 10px;
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

        @keyframes fadeIn {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</head>
<body>
    <div class="page-container">
        <!-- Header -->
        <header>
            <div><h2>🎨 Nhận dạng trường phái hội hoạ</h2></div>
            <div class="header-buttons">
            <button onclick="window.location.href='http://127.0.0.1:8000/user_home'">
                <i class="fas fa-home"></i> Trang chủ
            </button>

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

        <h2>📋 Danh sách Bài đăng từ Admin</h2>
            <div class="post-container">
                @if(isset($posts) && $posts->count() > 0)
                    @foreach($posts as $post)
                        <div class="post-card">
                            <div class="post-title">{{ $post->title }}</div>
                            <div class="post-content">{{ Str::limit($post->content, 200) }}</div>
                            <div class="post-date">🕒 {{ \Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}</div>
                        </div>
                    @endforeach
                @else
                    <div class="no-posts">Hiện tại không có bài đăng nào từ Admin.</div>
                @endif
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
