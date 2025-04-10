@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 mb-4 rounded-lg shadow-lg border border-green-500">
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto p-8 bg-white rounded-lg shadow-lg max-w-3xl border border-gray-300">
    <h2 class="text-3xl font-semibold text-center mb-6 text-gray-800">Chỉnh sửa trường phái</h2>

    <style>
        /* Định nghĩa kiểu cho bảng */
        table {
            width: 100%;
            border-collapse: collapse; /* Gộp các đường viền */
        }
        td {
            padding: 16px; /* Khoảng cách bên trong ô */
            border: 1px solid black; /* Đường viền màu đen cho ô */
        }
        label {
            display: block; /* Đảm bảo label chiếm toàn bộ chiều rộng */
            margin-bottom: 8px; /* Khoảng cách dưới label */
        }
        input[type="text"],
        input[type="file"] {
            width: 100%; /* Chiều rộng 100% cho input */
            padding: 12px; /* Padding cho input */
            border: 1px solid #ccc; /* Đường viền cho input */
            border-radius: 4px; /* Bo góc cho input */
            transition: border-color 0.3s; /* Hiệu ứng chuyển tiếp cho border */
        }
        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #3b82f6; /* Màu border khi focus */
            outline: none; /* Bỏ outline mặc định */
        }
        button {
            width: 100%; /* Chiều rộng 100% cho nút */
            background-color: #3b82f6; /* Màu nền cho nút */
            color: white; /* Màu chữ cho nút */
            padding: 12px; /* Padding cho nút */
            border: none; /* Bỏ đường viền cho nút */
            border-radius: 4px; /* Bo góc cho nút */
            cursor: pointer; /* Con trỏ chuột khi hover */
            transition: background-color 0.3s; /* Hiệu ứng chuyển tiếp cho background */
        }
        button:hover {
            background-color: #2563eb; /* Màu nền khi hover */
        }
    </style>

    <!-- resources/views/admin/images/edit.blade.php -->
    <form action="{{ route('admin.images.update', $image->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Sử dụng phương thức PUT để thực hiện cập nhật -->
        
        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="label">Label</label>
                        <input type="text" name="label" value="{{ $image->label }}" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="file">Chọn ảnh mới (Nếu muốn thay đổi)</label>
                        <input type="file" name="file">
                    </td>
                </tr>
                <tr>
                    <td class="text-center">
                        <button type="submit">
                            Cập nhật ảnh
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>