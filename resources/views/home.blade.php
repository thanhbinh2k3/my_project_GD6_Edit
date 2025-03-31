<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="flex">

        <!-- Sidebar bên trái -->
        <div class="w-64 bg-blue-800 text-white p-4 h-screen">
            <h2 class="text-xl font-bold">Admin</h2>
            <ul class="mt-4">
                <li class="border-b border-black">
                    <a href="{{ route('admin.dashboard') }}" class="block py-2 load-page" data-url="{{ route('admin.dashboard') }}">Dashboard</a>
                </li>
                <li class="border-b border-black">
                    <a href="{{ route('user.index') }}" class="block py-2 load-page" data-url="{{ route('user.index') }}">Quản lý người dùng</a>
                </li>
                <li class="border-b border-black">
                    <a href="{{ route('admin.posts.index') }}" class="block py-2 load-page" data-url="{{ route('admin.posts.index') }}">Quản lý bài đăng</a>
                </li>
                <li class="border-b border-black">
                    <a href="{{ route('file.upload') }}" class="block py-2 load-page" data-url="{{ route('file.upload') }}">Upload file</a>
                </li>
                <!-- Thêm nút Logout -->
                <li class="border-b border-black">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 text-red-500">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Nội dung chính bên phải -->
        <div class="flex-1 p-6" id="main-content">
            <h1 class="text-2xl font-bold text-center">Chào mừng bạn đến với Trang Chủ</h1>
            <p class="text-center mt-4">Đây là trang chính sau khi đăng nhập thành công.</p>
        </div>
        
    </div>

    <script>
        $(document).ready(function() {
            $(".load-page").click(function(event) {
                event.preventDefault();
                var url = $(this).data("url");

                $.get(url, function(data) {
                    $("#main-content").html(data);
                }).fail(function() {
                    alert("Không thể tải nội dung, vui lòng thử lại!");
                });
            });
        });
    </script>

</body>
</html>
