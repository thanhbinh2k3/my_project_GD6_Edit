<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết trường phái: {{ $image->label }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        body {
            padding: 2rem;
            background: #f9f9f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }
        img {
            max-width: 100%;
            border-radius: 8px;
        }
        h2 {
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chi tiết trường phái: {{ $image->label }}</h2>
        <img src="{{ asset('storage/images/' . $image->filename) }}" alt="{{ $image->label }}">
        <p><strong>Tên file:</strong> {{ $image->filename }}</p>
        <p><strong>Trường phái:</strong> {{ $image->label }}</p>
        <p><strong>Lượt xem:</strong> {{ $views }}</p>

        <a href="{{ route('user.styles.index') }}" class="btn btn-primary mt-3">← Quay lại danh sách</a>
    </div>
</body>
</html>
