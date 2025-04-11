<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dự đoán trường phái hội hoạ</title>
    <style>
        /* Reset nhẹ nhàng */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(to right, #f8fafc, #e0f2fe);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
            color: #333;
        }

        h1 {
            font-size: 32px;
            margin-bottom: 30px;
            color: #1d4ed8;
            animation: fadeIn 1s ease-in-out;
        }

        form {
            background-color: white;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        form:hover {
            transform: translateY(-3px);
        }

        label {
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        input[type="file"] {
            margin-bottom: 20px;
            padding: 8px;
            width: 100%;
            border: 2px dashed #60a5fa;
            border-radius: 10px;
            background-color: #f0f9ff;
            transition: border-color 0.3s;
        }

        input[type="file"]:hover {
            border-color: #3b82f6;
        }

        button {
            background-color: #3b82f6;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 12px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        button:hover {
            background-color: #2563eb;
            transform: scale(1.05);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <h1>🎨 Dự đoán trường phái hội hoạ</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Chọn ảnh:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">🔍 Dự đoán</button>
    </form>
</body>
</html>
