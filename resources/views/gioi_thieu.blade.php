<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giới thiệu - Nhận dạng trường phái hội họa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Khám phá nghệ thuật bằng trí tuệ nhân tạo, nhận diện trường phái hội họa từ ảnh chụp. Đăng nhập để bắt đầu!">
    
    <!-- Favicon -->
    <link rel="icon" href="path-to-your-favicon.ico" type="image/x-icon">

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

        .content-box {
            background-color: white;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
            animation: fadeInUp 1.2s ease;
        }

        .intro-image {
            width: 100%;
            max-width: 600px;
            height: auto;
            border-radius: 12px;
            margin: 20px auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
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

        .content {
            margin-top: 10px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .separator {
            margin: 15px 0;
            border-top: 2px solid #888;
        }
        .toggle-btn {
            cursor: pointer;
            color: #007bff;
            text-decoration: underline;
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

        .content-section {
            padding: 40px 20px;
            max-width: 800px;
            margin: auto;
        }

        .white-background {
            background-color: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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


    <!-- Nội dung giới thiệu trong khung trắng -->
    <div class="container">
        <div class="content-box">
            <!-- Thẻ Tiêu đề (Header) -->
            <h2>
                Giới thiệu về hệ thống nhận dạng trường phái hội họa 
                <span class="toggle-btn" onclick="toggleContent()">[Hiện]</span>
            </h2>

    <!-- Thẻ Phân Cách (Separator) -->
        <div class="separator"></div>

            <!-- Thẻ Chứa Nội Dung -->
            <div id="content" class="content" style="display: none; text-align: left;">
                <ol id="nav-list">
                    <li data-target="section-1">Hệ thống nhận dạng trường phái hội họa là gì?</li>
                    <li data-target="section-2">Ý tưởng xây dựng hệ thống ra đời như thế nào?</li>
                    <li data-target="section-3">Hệ thống sử dụng công nghệ AI nào?</li>
                    <li data-target="section-4">Ứng dụng của hệ thống trong nghệ thuật và giáo dục?</li>
                    <li data-target="section-5">Làm thế nào để huấn luyện mô hình nhận dạng tranh?</li>
                    <li data-target="section-6">Độ chính xác và hiệu quả của hệ thống?</li>
                </ol>
            </div>
        </div>
    </div>

    <div class="white-background">
        <div id="section-1" class="content-section">
            <h3>1. Hệ thống nhận dạng trường phái hội họa là gì?</h3>
            <img src="Chatbot.jpg" class="intro-image" alt="Giới thiệu 1">
            <p style="text-align: justify">Hệ thống giúp xác định trường phái hội họa của một tác phẩm dựa trên đặc điểm thị giác học máy học được từ dữ liệu huấn luyện. Các thuật toán học máy, đặc biệt là học sâu (deep learning), đã được ứng dụng để phân tích các yếu tố hình ảnh như màu sắc, đường nét, kết cấu, và hình dạng trong từng tác phẩm. Thông qua việc huấn luyện trên một lượng lớn dữ liệu từ các tác phẩm hội họa nổi tiếng của các trường phái khác nhau, hệ thống có thể học được các đặc điểm đặc trưng và phân loại chúng vào các nhóm cụ thể. Ví dụ, các tác phẩm của trường phái ấn tượng sẽ có màu sắc tươi sáng, đường nét mềm mại, trong khi các tác phẩm của trường phái hiện thực sẽ thể hiện rõ sự chi tiết và chính xác trong hình khối.</p>
            <p style="text-align: justify">Hệ thống không chỉ nhận diện được trường phái mà còn có khả năng phân tích và đưa ra đánh giá về sự thay đổi trong các yếu tố hình ảnh theo thời gian. Điều này giúp nhận diện sự tiến hóa của các phong cách nghệ thuật và sự giao thoa giữa các trường phái trong lịch sử nghệ thuật. Mỗi trường phái hội họa có những đặc điểm hình ảnh riêng biệt, từ đó giúp các nhà nghiên cứu, nhà sưu tập nghệ thuật, và người yêu thích nghệ thuật có cái nhìn sâu sắc hơn về các tác phẩm. Hệ thống này cũng hỗ trợ trong việc bảo tồn và phục chế nghệ thuật, khi có thể nhận diện những đặc điểm quan trọng, qua đó giữ gìn được những giá trị nghệ thuật nguyên bản của tác phẩm.</p>
        </div>

        <div id="section-2" class="content-section">
            <h3>2. Ý tưởng xây dựng hệ thống ra đời như thế nào?</h3>
            <img src="chatbot_2.jpg" class="intro-image" alt="Giới thiệu 2">
            <p style="text-align: justify">Ý tưởng xuất phát từ nhu cầu ứng dụng AI trong nghệ thuật, nhằm tăng tương tác giữa công nghệ và cảm thụ nghệ thuật. Với sự phát triển nhanh chóng của trí tuệ nhân tạo, các công nghệ mới đang mở ra những cách thức chưa từng có để khám phá và trải nghiệm nghệ thuật. Việc kết hợp AI vào nghệ thuật không chỉ giúp nâng cao khả năng sáng tạo mà còn mở ra cơ hội để cá nhân hóa trải nghiệm nghệ thuật, giúp người xem có thể tương tác trực tiếp với tác phẩm qua các công cụ và phần mềm hỗ trợ.</p>
            <p style="text-align: justify">AI có thể phân tích và tái tạo các phong cách nghệ thuật, thậm chí sáng tác ra các tác phẩm mới dựa trên các yếu tố đã học được từ những tác phẩm trước đó. Điều này không chỉ thay đổi cách mà chúng ta tạo ra nghệ thuật mà còn thay đổi cách mà chúng ta cảm nhận và tương tác với nghệ thuật. Các nền tảng ứng dụng AI giúp người xem có thể khám phá các chiều sâu mới của một tác phẩm, từ việc phân tích hình ảnh, âm thanh đến các yếu tố văn hóa, lịch sử gắn liền với nghệ thuật. Hơn thế nữa, AI còn có thể giúp mở rộng khả năng sáng tạo của các nghệ sĩ, hỗ trợ họ trong quá trình tìm kiếm nguồn cảm hứng mới và vượt qua các rào cản truyền thống trong nghệ thuật.</p>
        </div>

        <div id="section-3" class="content-section">
            <h3>3. Hệ thống sử dụng công nghệ AI nào?</h3>
            <img src="cb_1.jpg" class="intro-image" alt="Giới thiệu 3">
            <p style="text-align: justify">Hệ thống sử dụng mạng nơ-ron tích chập (CNN) để học và nhận diện trường phái từ ảnh tranh vẽ. Mạng nơ-ron tích chập là một kiến trúc mạng học sâu đặc biệt hiệu quả trong việc xử lý dữ liệu hình ảnh, giúp nhận diện và phân loại các đặc điểm hình ảnh phức tạp. Quá trình học của CNN diễn ra thông qua các lớp chập (convolutional layers) và lớp gộp (pooling layers), nơi mà mạng sẽ tự động trích xuất các đặc trưng quan trọng từ ảnh như đường nét, màu sắc, kết cấu và hình dạng. Điều này cho phép hệ thống nhận diện được những yếu tố đặc trưng của các trường phái hội họa khác nhau, từ các phong cách cổ điển như phục hưng cho đến những phong cách hiện đại như ấn tượng hay siêu thực.</p>
            <p style="text-align: justify">Sau khi được huấn luyện trên một lượng lớn dữ liệu tranh vẽ, hệ thống có thể phân tích các tác phẩm hội họa một cách chính xác, xác định trường phái mà tác phẩm thuộc về, thậm chí nhận diện được sự giao thoa giữa các phong cách trong cùng một tác phẩm. Việc sử dụng CNN không chỉ tăng khả năng chính xác trong nhận diện mà còn giúp hệ thống học hỏi và thích nghi với những biến đổi trong phong cách nghệ thuật qua các thời kỳ. Điều này mang lại giá trị lớn trong việc phân loại, phân tích và bảo tồn các tác phẩm nghệ thuật quý giá.</p>
        </div>

        <div id="section-4" class="content-section">
            <h3>4. Ứng dụng của hệ thống trong nghệ thuật và giáo dục?</h3>
            <img src="cb_2.jpg" class="intro-image" alt="Giới thiệu 3">
            <p style="text-align: justify">
                Hệ thống này đã được ứng dụng rộng rãi trong nhiều lĩnh vực nghệ thuật và giáo dục. Trong nghệ thuật, nó giúp các nghệ sĩ sáng tạo những tác phẩm độc đáo, kết hợp giữa kỹ thuật truyền thống và công nghệ hiện đại. Hệ thống này cung cấp những công cụ mạnh mẽ để người dùng có thể tạo ra các tác phẩm nghệ thuật theo cách riêng của mình, từ đó thúc đẩy sự đổi mới và sáng tạo trong nghệ thuật.
            </p>
            <p style="text-align: justify">
                Trong giáo dục, hệ thống này đóng vai trò quan trọng trong việc giảng dạy các môn học sáng tạo và nghệ thuật. Các giáo viên có thể sử dụng nó để giúp học sinh phát triển kỹ năng sáng tạo, đồng thời thúc đẩy khả năng tư duy phản biện và phân tích. Nhờ vào khả năng mô phỏng và tương tác, hệ thống này giúp học sinh dễ dàng tiếp cận với các khái niệm trừu tượng và khuyến khích sự sáng tạo trong học tập.
            </p>
        </div>

        <div id="section-5" class="content-section">
            <h3>5. Làm thế nào để huấn luyện mô hình nhận dạng tranh?</h3>
            <img src="cb_3.jpg" class="intro-image" alt="Giới thiệu 3">
            <p style="text-align: justify">
                Để huấn luyện mô hình nhận dạng tranh, bước đầu tiên là thu thập một bộ dữ liệu lớn chứa các hình ảnh tranh được phân loại rõ ràng. Các bức tranh này có thể là các tác phẩm hội họa cổ điển, hiện đại, hoặc tranh vẽ theo nhiều phong cách khác nhau. Bộ dữ liệu này cần phải được gắn nhãn chính xác để mô hình có thể học được sự khác biệt giữa các loại tranh và phong cách nghệ thuật.
            </p>
            <p style="text-align: justify">
                Sau khi thu thập bộ dữ liệu, mô hình sẽ được huấn luyện sử dụng các thuật toán học sâu, đặc biệt là mạng nơ-ron tích chập (CNN), để nhận diện các đặc điểm trong tranh. Quá trình huấn luyện cần được điều chỉnh với các tham số khác nhau như số lớp, tốc độ học, và số lượng epoch để tối ưu hóa kết quả. Sau khi mô hình được huấn luyện, nó có thể được sử dụng để nhận dạng các bức tranh mới và phân loại chúng vào các nhóm khác nhau dựa trên đặc điểm đã học được.
            </p>
        </div>

        <div id="section-6" class="content-section">
            <h3>6. Độ chính xác và hiệu quả của hệ thống?</h3>
            <img src="cb_1.jpg" class="intro-image" alt="Giới thiệu 3">
            <p style="text-align: justify">
                Hệ thống được thiết kế để cung cấp độ chính xác cao trong việc xử lý và phân tích dữ liệu. Nhờ vào các thuật toán tiên tiến và quy trình kiểm tra chặt chẽ, hệ thống có thể đưa ra kết quả đáng tin cậy trong thời gian ngắn.
            </p>
            <p style="text-align: justify">
                Ngoài ra, hiệu quả của hệ thống cũng được nâng cao nhờ vào khả năng xử lý nhanh và giảm thiểu sai sót, giúp tiết kiệm thời gian và nguồn lực cho người dùng trong việc triển khai và sử dụng.
            </p>
        </div>
    </div>

    <!-- Kết thúc -->
    <div class="container">
        <p>Hãy tham gia cộng đồng nghệ thuật của chúng tôi ngay hôm nay và khám phá vẻ đẹp nghệ thuật qua công nghệ trí tuệ nhân tạo!</p>
    </div>
    <script>
        function toggleContent() {
            const content = document.getElementById('content');
            const toggleBtn = document.querySelector('.toggle-btn');
            if (content.style.display === 'none') {
                content.style.display = 'block';
                toggleBtn.innerText = '[Ẩn]';
            } else {
                content.style.display = 'none';
                toggleBtn.innerText = '[Hiện]';
            }
        }

        document.addEventListener('DOMContentLoaded', function () {
        const items = document.querySelectorAll('#nav-list li');
        items.forEach(item => {
            item.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const targetSection = document.getElementById(targetId);
                if (targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    });
    </script>

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
