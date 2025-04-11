<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f5f8fa;
        padding: 20px;
    }

    h2 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
    }

    a {
        text-decoration: none;
        color: #3498db;
        transition: color 0.2s ease;
    }

    a:hover {
        color: #1d6fa5;
    }

    .success-message {
        color: green;
        background-color: #e8f5e9;
        padding: 10px 15px;
        border-radius: 8px;
        width: fit-content;
        margin: 0 auto 20px auto;
    }

    .add-btn {
        display: inline-block;
        margin-bottom: 20px;
        background-color: #2ecc71;
        color: white;
        padding: 10px 15px;
        border-radius: 10px;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .add-btn:hover {
        background-color: #27ae60;
        transform: scale(1.05);
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 12px;
        overflow: hidden;
        animation: fadeIn 0.5s ease;
    }

    th, td {
        text-align: left;
        padding: 15px;
    }

    th {
        background-color: #f0f4f8;
        color: #2c3e50;
    }

    tr:nth-child(even) {
        background-color: #f9fbfc;
    }

    tr:hover {
        background-color: #ecf0f1;
        transition: background-color 0.3s ease;
    }

    .action-buttons a,
    .action-buttons button {
        margin-right: 8px;
        padding: 6px 10px;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        border: none;
        transition: all 0.3s ease;
    }

    .action-buttons a {
        background-color: #f1c40f;
        color: white;
    }

    .action-buttons a:hover {
        background-color: #d4ac0d;
    }

    .action-buttons button {
        background-color: #e74c3c;
        color: white;
    }

    .action-buttons button:hover {
        background-color: #c0392b;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<h2>📦 Danh sách gói dịch vụ</h2>

@if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
@endif

<a href="{{ route('admin.plans.create') }}" class="add-btn">➕ Thêm mới</a>

<table>
    <tr>
        <th>#</th>
        <th>Tên</th>
        <th>Mô tả</th>
        <th>Giá (VND)</th>
        <th>Thời hạn (ngày)</th>
        <th>Ngày tạo</th>
        <th>Ngày cập nhật</th>
        <th>Hành động</th>
    </tr>
    @foreach($plans as $index => $plan)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $plan->name }}</td>
            <td>{{ $plan->description }}</td>
            <td>{{ number_format($plan->price, 0, ',', '.') }}</td>
            <td>{{ $plan->duration_days }}</td>
            <td>{{ $plan->created_at->format('d/m/Y H:i') }}</td>
            <td>{{ $plan->updated_at->diffForHumans() }}</td>
            <td class="action-buttons">
                <a href="{{ route('admin.plans.edit', $plan->id) }}">✏️ Sửa</a>
                <form method="POST" action="{{ route('admin.plans.destroy', $plan->id) }}" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá?')">🗑️ Xoá</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
