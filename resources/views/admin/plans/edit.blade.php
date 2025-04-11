<!-- Thêm đoạn style vào phần head hoặc file CSS -->
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f7fa;
        margin: 0;
        padding: 30px;
    }

    h2 {
        color: #333;
        text-align: center;
        margin-bottom: 20px;
        animation: fadeIn 0.8s ease-in-out;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        background: #ffffff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        animation: slideUp 0.6s ease;
    }

    label {
        font-weight: bold;
        color: #444;
    }

    input[type="text"],
    input[type="number"],
    textarea {
        width: 100%;
        padding: 12px 14px;
        margin-top: 6px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 10px;
        transition: border-color 0.3s ease;
    }

    input:focus,
    textarea:focus {
        border-color: #4a90e2;
        outline: none;
    }

    button {
        background-color: #4a90e2;
        color: white;
        padding: 12px 24px;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
        background-color: #357ABD;
        transform: scale(1.05);
    }

    a {
        display: block;
        text-align: center;
        margin-top: 20px;
        text-decoration: none;
        color: #4a90e2;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    a:hover {
        color: #357ABD;
    }

    p,
    ul {
        text-align: center;
    }

    p {
        font-weight: bold;
    }

    @keyframes slideUp {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
</style>

<!-- HTML nội dung -->
<h2>Sửa gói dịch vụ</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if($errors->any())
    <ul style="color: red">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form method="POST" action="{{ route('admin.plans.update', $plan->id) }}">
    @csrf
    @method('PUT')

    <label for="name">Tên gói:</label>
    <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}" required>

    <label for="description">Mô tả:</label>
    <textarea name="description" id="description" required>{{ old('description', $plan->description) }}</textarea>

    <label for="price">Giá (VND):</label>
    <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $plan->price) }}" required>

    <label for="duration_days">Thời hạn sử dụng (ngày):</label>
    <input type="number" name="duration_days" id="duration_days" value="{{ old('duration_days', $plan->duration_days) }}" required>

    <button type="submit">Cập nhật</button>
</form>

<a href="{{ route('admin.plans.index') }}">← Quay lại danh sách</a>
