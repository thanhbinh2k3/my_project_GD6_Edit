<!-- resources/views/user/predict.blade.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dự đoán trường phái hội hoạ</title>
</head>
<body>
    <h1>Dự đoán trường phái hội hoạ</h1>
    <form action="#" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image">Chọn ảnh:</label>
        <input type="file" name="image" id="image" required>
        <button type="submit">Dự đoán</button>
    </form>
</body>
</html>
