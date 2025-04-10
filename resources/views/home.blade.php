<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .alert-success {
            background-color: #4CAF50;
            color: white;
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">
    <!-- Kiểm tra và hiển thị thông báo -->
    @if(session('status'))
        <div id="status-message" class="alert alert-success">
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

    <div class="flex">

        <!-- Sidebar bên trái -->
        <div class="w-64 bg-blue-800 text-white p-4 h-screen">
            <h2 class="text-xl font-bold">Admin Page</h2>
            <ul class="mt-4">
                <li class="border-b border-black">
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 load-page" data-url="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="border-b border-black">
                    <a href="{{ route('user.index') }}" class="block py-2 load-page" data-url="{{ route('user.index') }}">Quản lý người dùng</a>
                </li>
                <li class="border-b border-black">
                    <a href="{{ route('admin.images.index') }}" class="block py-2 load-page" data-url="{{ route('admin.images.index') }}">Quản lý trường phái</a>
                </li>
                <li class="border-b border-black">
                    <a href="{{ route('posts.index') }}" class="block py-2 load-page" data-url="{{ route('posts.index') }}">Quản lý bài đăng</a>
                </li>
                <li class="border-b border-black">
                    <a href="{{ route('admin.plans.index') }}" class="block py-2 load-page" data-url="{{ route('admin.plans.index') }}">Quản lý gói dịch vụ</a>
                </li>
                <li class="border-b border-black">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <button type="submit" style="padding: 5px;" id="logout-button">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>


        <!-- Nội dung chính bên phải -->
        <div class="flex-1 p-6" id="main-content">
            <h1 class="text-2xl font-bold text-center">Chào mừng bạn đến với Trang Chủ</h1>
            <p class="text-center mt-4">Đây là trang chính sau khi đăng nhập thành công.</p>

            @if(isset($user))
                <h2 class="text-xl font-bold mt-6">Thông tin người dùng</h2>
                <p>Tên: {{ $user->name }}</p>
                <p>Email: {{ $user->email }}</p>
                <a href="{{ route('user.index') }}" class="text-blue-500">Quay lại danh sách người dùng</a>
            @endif
        </div>
        
    </div>

    <script>
        $(document).ready(function() {
            $(".load-page").click(function(event) {
                event.preventDefault();
                var url = $(this).data("url");
                
                $.get(url, function(data) {
                    $("#main-content").html(data); // Tải nội dung vào phần main-content
                }).fail(function() {
                    alert("Không thể tải nội dung, vui lòng thử lại!");
                });
            });

            // Thêm sự kiện để load trang chi tiết người dùng vào panel phải
            $(".view").click(function(event) {
                event.preventDefault();
                var url = $(this).attr("href");

                $.get(url, function(data) {
                    $("#main-content").html(data); // Tải nội dung chi tiết vào panel phải
                }).fail(function() {
                    alert("Không thể tải nội dung, vui lòng thử lại!");
                });
            });

            // Xử lý sự kiện đăng xuất
            $('#logout-form').on('submit', function(event) {
                event.preventDefault(); // Ngừng form submit mặc định
                // Đăng xuất và chuyển hướng đến trang chủ
                $.post($(this).attr('action'), $(this).serialize(), function() {
                    window.location.href = "http://127.0.0.1:8000"; // Chuyển hướng sau khi đăng xuất
                });
            });
        });
    </script>

</body>
</html>
