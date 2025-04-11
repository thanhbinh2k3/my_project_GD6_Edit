<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách trường phái hội hoạ</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #f8f9fa, #e3f2fd);
            margin: 0;
            padding: 40px 20px;
            color: #333;
        }

        .main-content {
            max-width: 1000px;
            margin: auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h3 {
            text-align: center;
            font-size: 28px;
            color: #2c3e50;
            margin-bottom: 30px;
            animation: popIn 0.6s ease-out;
        }

        @keyframes popIn {
            0% { transform: scale(0.9); opacity: 0; }
            100% { transform: scale(1); opacity: 1; }
        }

        .search-box {
            text-align: center;
            margin-bottom: 30px;
        }

        .search-box input[type="text"] {
            padding: 12px 20px;
            width: 60%;
            max-width: 400px;
            border: 1px solid #ccc;
            border-radius: 30px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-box input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
            box-shadow: 0 0 5px rgba(0,123,255,0.4);
        }

        .search-box button {
            padding: 12px 20px;
            background-color: #007bff;
            border: none;
            border-radius: 30px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 10px;
        }

        .search-box button:hover {
            background-color: #0056b3;
            transform: translateY(-2px);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 14px;
            border-bottom: 1px solid #e0e0e0;
            text-align: center;
            vertical-align: middle;
        }

        th {
            background-color: #f5f5f5;
            font-weight: 600;
            color: #555;
        }

        td img {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .btn {
            display: inline-block;
            padding: 8px 14px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-info {
            background-color: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #e74c3c;
            color: white;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
            margin-top: 30px;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

        button.btn-info {
            border: none;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .pagination svg {
            height: 1.2em;
        }

        .alert-success {
            text-align: center;
            color: #28a745;
            font-weight: bold;
            margin-bottom: 20px;
        }

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

        .animated-icon {
            display: inline-block;
            animation: hueRotate 5s infinite linear;
            transition: transform 0.3s ease;
            filter: hue-rotate(0deg);
        }

        .animated-icon:hover {
            transform: scale(1.3) rotate(-15deg);
        }

        @keyframes hueRotate {
            0% { filter: hue-rotate(0deg); }
            100% { filter: hue-rotate(360deg); }
        }
    </style>
</head>
<body>
<div class="page-container">
    <!-- Header -->
    <header>
        <div>
            <h2>
                <span class="animated-icon">🎨</span> Nhận dạng trường phái hội hoạ
            </h2>
        </div>
        <div class="header-buttons">
            <button onclick="window.location.href='{{ route('user.plans') }}'">
                <i class="fas fa-gem"></i> Gói dịch vụ
            </button>

            <button onclick="window.location.href='{{ route('user.predict') }}'">
                <i class="fas fa-magic"></i> Dự đoán
            </button>

            <button onclick="window.location.href='{{ route('user.posts.index_2') }}'">
                <i class="fas fa-newspaper"></i> Bài đăng từ Admin
            </button>

            <button onclick="window.location.href='{{ route('user.styles.index') }}'">
                <i class="fas fa-palette"></i> Trường phái hội hoạ
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

    <div class="main-content">
        @if(session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h3>🖼️ Danh sách trường phái hội hoạ</h3>

        <div class="search-box">
            <form action="{{ route('user.styles') }}" method="GET">
                <input type="text" name="query" value="{{ request('query') }}" placeholder="🔍 Tìm trường phái...">
                <button type="submit">Tìm kiếm</button>
            </form>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên file</th>
                    <th>Trường phái</th>
                    <th>Lượt xem</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($styles as $style)
                <tr>
                    <td>
                        <img src="{{ asset('storage/images/' . $style->filename) }}" alt="{{ $style->label }}" style="max-width: 100px;">
                    </td>
                    <td>{{ $style->filename }}</td>
                    <td>{{ $style->label }}</td>
                    <td>{{ Cache::get('image_views_' . $style->id, 0) }} lượt xem</td>
                    <td>
                        <a href="{{ route('user.styles.show', $style->id) }}" class="btn btn-info">
                            <i class="fas fa-eye"></i> Xem
                        </a>
                        <form action="{{ route('user.styles.like', $style->id) }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="btn btn-info" style="background-color: #dc3545;">
                                ❤️ {{ $style->likes ?? 0 }}
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="text-align: center;">
            <a href="{{ route('user.styles.resetViews') }}"
               class="btn btn-danger"
               onclick="return confirm('Bạn có chắc muốn reset toàn bộ lượt xem và lượt like?')">
               🔄 Reset lượt xem & lượt like
            </a>
        </div>

        <div class="pagination">
            {{ $styles->withQueryString()->links() }}
        </div>
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
