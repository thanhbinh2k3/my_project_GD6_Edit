<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách gói dịch vụ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600&display=swap');

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Quicksand', sans-serif;
            background-color: #fefefe;
            color: #333;
            transition: background-color 0.3s ease;
        }

        html, body {
            height: 100%;
        }

        .page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header, footer {
            background: linear-gradient(to right, #edf2fb, #e2e8f0);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        header h2 {
            margin: 0;
            font-weight: 600;
            font-size: 24px;
            color: #1e40af;
        }

        .header-buttons button {
            margin-left: 12px;
            padding: 8px 16px;
            background-color: #3b82f6;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: transform 0.2s ease, background-color 0.3s ease;
        }

        .header-buttons button:hover {
            background-color: #2563eb;
            transform: scale(1.05);
        }

        .main-content {
            flex: 1;
            padding: 60px 20px;
            background: #f9fafb;
            text-align: center;
            animation: fadeInUp 0.6s ease;
        }

        .main-content h2 {
            color: #334155;
            margin-bottom: 30px;
            font-size: 28px;
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .plans-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 32px;
        }

        .plan-card {
            width: 280px;
            padding: 25px;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.06);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .plan-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        }

        .plan-card h3 {
            color: #1d4ed8;
            margin-bottom: 12px;
            font-weight: 600;
        }

        .plan-card p {
            font-size: 15px;
            color: #475569;
            margin-bottom: 20px;
        }

        .plan-card button {
            background-color: #10b981;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .plan-card button:hover {
            background-color: #059669;
            transform: scale(1.05);
        }

        .plan-card button:disabled {
            background-color: #cbd5e1;
            cursor: not-allowed;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #a7f3d0;
            border-radius: 10px;
            padding: 10px 20px;
            margin-bottom: 25px;
            display: inline-block;
            font-weight: 500;
        }

        .main-content img {
            width: 100%;
            max-width: 600px;
            margin: 30px auto;
            border-radius: 15px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .main-content img:hover {
            transform: scale(1.02);
        }

        footer {
            background: #e2e8f0;
            padding: 30px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            font-size: 14px;
            border-top: 1px solid #cbd5e1;
        }

        .footer-section {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            max-width: 300px;
            margin: 10px 0;
        }

        .footer-section img {
            width: 44px;
            height: 44px;
        }

        .footer-section div strong {
            display: block;
            font-size: 15px;
            margin-bottom: 4px;
            color: #111827;
        }

        .footer-section div p {
            margin: 0;
            line-height: 1.5;
            color: #4b5563;
        }

        button i {
            margin-right: 6px;
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
    <h2>🎁 Danh sách gói dịch vụ VIP</h2>
    
    @if(session('success'))
        <div class="alert-success"><strong>{{ session('success') }}</strong></div>
    @endif

        <div class="plans-container">
            @foreach ($plans as $plan)
                <div class="plan-card">
                    <h3>{{ $plan->name }}</h3>
                    <p><strong>Giá:</strong> {{ number_format($plan->price, 0, ',', '.') }} VNĐ</p>

                    @if ($currentPlanId == $plan->id)
                        <button disabled>Đã đăng ký</button>
                    @else
                        <form action="{{ route('user.plans.register', $plan->id) }}" method="POST">
                            @csrf
                            <button type="submit">Đăng ký</button>
                        </form>
                    @endif
                </div>
            @endforeach
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
