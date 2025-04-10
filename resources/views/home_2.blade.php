<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang chủ - Nhận dạng trường phái hội họa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Khám phá nghệ thuật bằng trí tuệ nhân tạo, nhận diện trường phái hội họa từ ảnh chụp. Đăng nhập để bắt đầu!">
    
    <!-- Favicon -->
    <link rel="icon" href="path-to-your-favicon.ico" type="image/x-icon">

    <!-- Thêm Font Awesome đúng cách -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

    <!-- Phần CSS cải tiến -->
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to right, #e0f2fe, #f0f9ff);
            margin: 0;
            padding: 0;
            color: #333;
        }

        .header {
            background-color: #0ea5e9;
            color: white;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header .logo {
            font-size: 32px;
            font-weight: bold;
            color: white;
        }

        .header .menu {
            display: flex;
            gap: 18px;
        }

        .header .menu a {
            color: white;
            text-decoration: none;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 6px;
            transition: 0.3s;
        }

        .header .menu a:hover {
            background-color: #2563eb;
        }

        .header .search {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .search input {
            padding: 8px 12px;
            border-radius: 8px;
            border: none;
            width: 220px;
        }

        .header .search button {
            padding: 8px 14px;
            background-color: #2563eb;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }

        .header .search button:hover {
            background-color: #1d4ed8;
        }

        .container {
            text-align: center;
            padding: 60px 20px;
        }

        h1, h2 {
            color: #1e3a8a;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease;
        }

        .highlight-text {
            color: #0ea5e9;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        p {
            max-width: 700px;
            margin: auto;
            font-size: 18px;
            color: #334155;
            line-height: 1.6;
            margin-bottom: 40px;
        }

        /* Sử dụng grid để sắp xếp các bài viết thành 2 hàng */
        .article-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 cột */
            gap: 20px;
            justify-items: center;
        }

        .article {
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 300px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        /* Hiệu ứng hover - nâng lên khi lướt qua */
        .article:hover {
            transform: translateY(-10px); /* Nâng lên 10px */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Tạo bóng mạnh hơn */
        }

        .article img {
            width: 100%;
            border-radius: 8px;
        }

        .article h3 {
            margin-top: 15px;
            color: #0ea5e9;
        }

        .article a {
            color: #2563eb;
            text-decoration: none;
        }

        .article a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            /* Chuyển sang 1 cột khi màn hình nhỏ hơn 768px */
            .article-container {
                grid-template-columns: 1fr;
            }
        }

        /* Footer */
        footer {
            background-color: #0ea5e9;
            color: white;
            padding: 40px 20px;
            position: relative;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            align-items: flex-start; /* Căn chỉnh phần tử ở đầu */
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .company-info {
            text-align: left; /* Căn trái cho phần thông tin công ty */
        }

        .contact-info, .social-icons {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }

        .social-icons img {
            width: 30px;   /* Kích thước của icon */
            height: 30px;  /* Kích thước của icon */
            margin: 0 10px;
            cursor: pointer;
            vertical-align: middle;  /* Căn giữa ảnh */
            transition: transform 0.3s;
        }

        .social-icons img:hover {
            transform: scale(1.1);  /* Hiệu ứng phóng to khi rê chuột */
        }

        .copyright {
            margin-top: 20px;
            font-size: 14px;
        }

        .copyright a {
            color: white;
            text-decoration: underline;
            transition: color 0.3s;
        }

        .copyright a:hover {
            color: #2563eb; /* Màu khi hover */
        }

        footer .scroll-to-top {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        /* Bao để đảm bảo không bị ảnh hưởng căn giữa từ cha */
        .copyright-wrap {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            text-align: left;
        }

        .contact-info {
            text-align: left;
        }

        footer .scroll-to-top:hover {
            background-color: #1d4ed8;
        }

    </style>

</head>
<body>
    <!-- Header -->
    <div class="header">
        <!-- Logo -->
        <div class="logo">Painting Style</div>

        <!-- Menu điều hướng -->
        <div class="menu">
            <a href="http://127.0.0.1:8000/">Trang chủ</a>
            <a href="{{ url('/gioi_thieu') }}">Giới thiệu</a>
            <a href="{{ route('login') }}">Đăng nhập</a>
            <a href="{{ route('register') }}">Đăng ký</a>
        </div>

        <!-- Thanh tìm kiếm -->
        <div class="search">
            <input type="text" placeholder="Tìm kiếm tác phẩm hoặc trường phái..." />
            <button>Tìm kiếm</button>
        </div>
    </div>

    <!-- Giới thiệu hệ thống -->
    <div class="container">
        <h1><span class="highlight-text">Chào mừng bạn đến</span> với hệ thống</h1>
        <p>Khám phá nghệ thuật bằng trí tuệ nhân tạo. Đăng nhập để bắt đầu sử dụng hệ thống phân tích và nhận diện trường phái hội họa từ ảnh chụp!</p>
    </div>

    <!-- Bài viết mới -->
    <div class="container">
        <h2>Bài Viết Mới</h2>
        <div class="article-container">
            <!-- Bài viết 1 -->
            <div class="article">
                <img src="im_2.jpg" alt="Art Example 1">
                <h3><a href="https://thegioihoihoa.com/blogs/tin-tuc-hoi-hoa/kham-pha-dieu-dac-biet-trong-tranh-truong-phai-an-tuong?srsltid=AfmBOopGKD5a5TVd8MKwR3eshTyrRMlnKyRxl6VZn98PO5DJIMxkE0Vx">Khám Phá Trường Phái Ấn Tượng</a></h3>
                <p>Trường phái Ấn tượng là trào lưu nghệ thuật mới mẻ của một tập thể các họa sĩ đang tìm kiếm sự công nhận cho kỹ thuật sáng tạo, đột phá trong sử dụng màu sắc...</p>
                <a href="https://thegioihoihoa.com/blogs/tin-tuc-hoi-hoa/kham-pha-dieu-dac-biet-trong-tranh-truong-phai-an-tuong?srsltid=AfmBOopGKD5a5TVd8MKwR3eshTyrRMlnKyRxl6VZn98PO5DJIMxkE0Vx">Đọc thêm</a>
            </div>

            <!-- Bài viết 2 -->
            <div class="article">
                <img src="cu_1.jpg" alt="Art Example 2">
                <h3><a href="https://www.tranhsonmainghethuat.com/tac-pham/tranh-truong-phai-bieu-hien/">Tranh Nghệ Thuật - Trường Phái Biểu Hiện</a></h3>
                <p>Trường phái biểu hiện là một cách để nghệ sĩ thể hiện cái tôi cá nhân, và đôi khi, để khám phá những chi tiết tinh tế của cuộc sống mà chúng ta thường bỏ qua...</p>
                <a href="https://www.tranhsonmainghethuat.com/tac-pham/tranh-truong-phai-bieu-hien/">Đọc thêm</a>
            </div>

            <!-- Bài viết 3 -->
            <div class="article">
                <img src="abs_1.jpg" alt="Art Example 3">
                <h3><a href="https://thegioihoihoa.com/blogs/tin-tuc-hoi-hoa/truong-phai-truu-tuong-la-gi-nhung-dieu-co-ban-can-biet?srsltid=AfmBOor2uo7mJbDc1EJpszM8sum9BWHNqrZ7p1HyhBAQ8nP1IP6DPltP">Trường phái trừu tượng là gì?</a></h3>
                <p>Trong suốt những năm đầu của thế kỷ 20, trường phái trừu tượng đã trở thành một trào lưu thống trị thế giới...</p>
                <a href="https://thegioihoihoa.com/blogs/tin-tuc-hoi-hoa/truong-phai-truu-tuong-la-gi-nhung-dieu-co-ban-can-biet?srsltid=AfmBOor2uo7mJbDc1EJpszM8sum9BWHNqrZ7p1HyhBAQ8nP1IP6DPltP">Đọc thêm</a>
            </div>

            <!-- Bài viết 4 -->
            <div class="article">
                <img src="classicism_1.jpg" alt="Art Example 4">
                <h3><a href="https://redsvn.net/truong-phai-co-dien-dinh-cao-cua-nen-nghe-thuat-nhan-loai2/">Trường phái Cổ điển – đỉnh cao của nền nghệ thuật nhân loại</a></h3>
                <p>Trường phái Cổ Điển được định nghĩa trong từ điển là trình độ cao nhất về Văn chương và Nghệ thuật, đặc biệt là phụ thuộc vào nền Văn Hóa Cổ Hy Lạp và Cổ La Mã...</p>
                <a href="https://redsvn.net/truong-phai-co-dien-dinh-cao-cua-nen-nghe-thuat-nhan-loai2/">Đọc thêm</a>
            </div>

            <!-- Bài viết 5 -->
            <div class="article">
                <img src="sur_1.png" alt="Art Example 5">
                <h3><a href="https://mythuatbui.edu.vn/tim-hieu-truong-phai-sieu-thuc-trong-hoi-hoa/">Tìm hiểu Trường phái Siêu thực trong hội họa</a></h3>
                <p>Trường phái nghệ thuật Siêu thực được xem là một Trường phái bí ẩn và độc đáo trong làng hội họa...</p>
                <a href="https://mythuatbui.edu.vn/tim-hieu-truong-phai-sieu-thuc-trong-hoi-hoa/">Đọc thêm</a>
            </div>
        </div>
    </div>


    <!-- Video giới thiệu -->
    <div class="container">
        <h2>Video Giới Thiệu</h2>
        <iframe width="600" height="400" src="https://www.youtube.com/embed/z6yoKpQ1fBw" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

    <!-- Footer -->
    <footer style="background-color: #03A9F4; padding: 40px; color: white;">
        <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
            <!-- Thông tin liên hệ -->
            <div style="flex: 0.5; min-width: 200px; padding: 10px;">
                <h3>Thông tin liên hệ</h3>
                <p style="color: black;">Email: paintingstyle@gmail.com</p>
                <p style="color: black;">Hotline: 0123 456 789</p>
                <p style="color: black;">Địa chỉ: 123 Đường Nghệ Thuật, TP.HCM</p>
            </div>
        </div>

        <div class="social-icons">
            <h3>Giới thiệu chúng tôi</h3>
            <img src="//upload.wikimedia.org/wikipedia/commons/thumb/b/b9/2023_Facebook_icon.svg/600px-2023_Facebook_icon.svg.png" alt="Facebook" onclick="window.open('https://www.facebook.com/', '_blank')">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a5/Instagram_icon.png/960px-Instagram_icon.png?20200512141346" alt="Instagram" onclick="window.open('https://www.instagram.com', '_blank')">
        </div>

        <!-- Thêm lớp bao riêng để đảm bảo căn trái -->
        <div class="copyright-wrap">
            <div class="copyright">
                <p>&copy; 2025 Painting Style. Tất cả quyền được bảo vệ.</p>
                <p><a href="#">Điều khoản sử dụng</a> | <a href="#">Chính sách bảo mật</a></p>
            </div>
        </div>

        <!-- Nút cuộn lên đầu trang -->
        <button class="scroll-to-top" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });">↑</button>
    </footer>

</body>
</html>
