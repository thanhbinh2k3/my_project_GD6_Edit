<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Bài Viết Mới</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 30px;
            box-sizing: border-box;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 20px;
        }
        td {
            padding: 16px;
            border: 1px solid black;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            min-height: 150px;
        }
        input[type="text"]:focus,
        textarea:focus {
            border-color: #3b82f6;
            outline: none;
        }
        button {
            width: 100%;
            background-color: #3b82f6;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2563eb;
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Tạo Bài Viết Mới</h1>

    @if(session('success'))
        <p class="success-message">{{ session('success') }}</p>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf

        <table>
            <tbody>
                <tr>
                    <td>
                        <label for="title">Tiêu đề:</label>
                        <input type="text" id="title" name="title" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="content">Nội dung:</label>
                        <textarea id="content" name="content" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button type="submit">Lưu bài viết</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>

    <br>
    <a href="{{ url('/') }}">Quay lại danh sách</a>
</body>
</html>
