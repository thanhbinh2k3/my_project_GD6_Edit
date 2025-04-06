<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh Thu - Admin</title>
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

    <!-- Nội dung chính - Bỏ sidebar -->
    <div class="p-6">

        <!-- Tiêu đề -->
        <h1 class="text-2xl font-bold text-center mb-6">Danh Sách Doanh Thu</h1>

        <!-- Bảng doanh thu -->
        <table class="min-w-full table-auto border-collapse bg-white rounded-lg shadow-md overflow-hidden">
            <thead>
                <tr class="bg-blue-800 text-white">
                    <th class="px-6 py-4 text-left">Mã Doanh Thu</th>
                    <th class="px-6 py-4 text-left">Ngày</th>
                    <th class="px-6 py-4 text-left">Số Lượng</th>
                    <th class="px-6 py-4 text-left">Tổng Tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($revenues as $revenue)
                    <tr class="border-b hover:bg-gray-100 transition duration-300">
                        <td class="px-6 py-4">{{ $revenue->id }}</td>
                        <td class="px-6 py-4">{{ $revenue->date }}</td>
                        <td class="px-6 py-4">{{ $revenue->quantity }}</td>
                        <td class="px-6 py-4">{{ number_format($revenue->total_amount, 0, ',', '.') }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
        });
    </script>
</body>
</html>
