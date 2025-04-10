<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        h1 {
            color: #1e3a8a;
            text-align: center;
            margin-bottom: 30px;
        }

        .container {
            max-width: 1000px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .stats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 20px;
        }

        .card {
            flex: 1 1 calc(25% - 20px);
            background-color: #eff6ff;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: transform 0.2s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card h2 {
            font-size: 36px;
            color: #1d4ed8;
            margin: 10px 0;
        }

        .card p {
            font-size: 16px;
            color: #374151;
        }

        @media (max-width: 768px) {
            .card {
                flex: 1 1 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Thống kê quản lý</h1>
        <div class="stats">
            <div class="card">
                <h2>{{ $usersCount }}</h2>
                <p>Người dùng</p>
            </div>
            <div class="card">
                <h2>{{ $postsCount }}</h2>
                <p>Bài đăng</p>
            </div>
            <div class="card">
                <h2>{{ $stylesCount }}</h2>
                <p>Trường phái hội hoạ</p>
            </div>
            <div class="card">
                <h2>{{ $packagesCount }}</h2>
                <p>Gói dịch vụ</p>
            </div>
        </div>
    </div>
</body>
</html>
