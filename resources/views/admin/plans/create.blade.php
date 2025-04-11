<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f9f9f9;
        padding: 30px;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 28px;
    }

    form {
        background: #fff;
        padding: 25px 30px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        max-width: 600px;
        margin: 0 auto;
        transition: transform 0.3s ease;
    }

    form:hover {
        transform: translateY(-3px);
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #444;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 10px 14px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        transition: border-color 0.3s;
    }

    input:focus,
    textarea:focus {
        border-color: #5b9bd5;
        outline: none;
    }

    button {
        background: #5b9bd5;
        color: #fff;
        border: none;
        padding: 12px 24px;
        border-radius: 12px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s, transform 0.2s;
    }

    button:hover {
        background: #417cbf;
        transform: scale(1.03);
    }

    .success-message {
        color: #28a745;
        text-align: center;
        font-weight: 500;
        margin-bottom: 15px;
    }

    .error-message {
        color: #dc3545;
        margin-bottom: 15px;
        padding-left: 20px;
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #5b9bd5;
        text-decoration: none;
        transition: color 0.3s;
    }

    a:hover {
        color: #417cbf;
    }
</style>

<h2>🧾 Thêm mới gói dịch vụ</h2>

@if(session('success'))
    <p class="success-message">{{ session('success') }}</p>
@endif

@if($errors->any())
    <ul class="error-message">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.plans.store') }}">
    @csrf

    <label for="name">📦 Tên gói:</label>
    <input type="text" name="name" id="name" value="{{ old('name') }}" required>

    <label for="description">📝 Mô tả:</label>
    <textarea name="description" id="description" required>{{ old('description') }}</textarea>

    <label for="price">💰 Giá (VND):</label>
    <input type="number" name="price" id="price" step="0.01" value="{{ old('price') }}" required>

    <label for="duration_days">⏳ Thời hạn sử dụng (ngày):</label>
    <input type="number" name="duration_days" id="duration_days" value="{{ old('duration_days') }}" required>

    <button type="submit">➕ Tạo mới</button>
</form>

<a href="{{ route('admin.plans.index') }}">← Quay lại danh sách</a>
