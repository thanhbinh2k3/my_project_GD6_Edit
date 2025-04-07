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

    <label for="name">Tên gói:</label><br>
    <input type="text" name="name" id="name" value="{{ old('name', $plan->name) }}" required><br><br>

    <label for="description">Mô tả:</label><br>
    <textarea name="description" id="description" required>{{ old('description', $plan->description) }}</textarea><br><br>

    <label for="price">Giá (VND):</label><br>
    <input type="number" name="price" id="price" step="0.01" value="{{ old('price', $plan->price) }}" required><br><br>

    <label for="duration_days">Thời hạn sử dụng (ngày):</label><br>
    <input type="number" name="duration_days" id="duration_days" value="{{ old('duration_days', $plan->duration_days) }}" required><br><br>

    <button type="submit">Cập nhật</button>
</form>

<br>
<a href="{{ route('admin.plans.index') }}">← Quay lại danh sách</a>
