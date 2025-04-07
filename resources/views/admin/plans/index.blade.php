<h2>Danh sách gói dịch vụ</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<a href="{{ route('admin.plans.create') }}">➕ Thêm mới</a>

<table border="1" cellpadding="10" cellspacing="0">
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
            <td>
                <a href="{{ route('admin.plans.edit', $plan->id) }}">✏️ Sửa</a>
                <form method="POST" action="{{ route('admin.plans.destroy', $plan->id) }}" style="display:inline">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('Bạn có chắc chắn muốn xoá?')">🗑️ Xoá</button>
                </form>
            </td>
        </tr>
    @endforeach
</table>
