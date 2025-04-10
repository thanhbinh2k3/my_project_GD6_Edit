@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 mb-4 rounded shadow">
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Danh sách ảnh</h2>

    <div class="overflow-x-auto mb-4">
        <table class="min-w-full table-auto bg-white shadow-md rounded-lg border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="py-3 px-4 text-left text-sm font-medium">Ảnh</th>
                    <th class="py-3 px-4 text-left text-sm font-medium">Trường phái</th>
                    <th class="py-3 px-4 text-left text-sm font-medium">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($images as $image)
                    <tr class="border-b hover:bg-gray-100 transition duration-200">
                        <td class="py-2 px-4 flex items-center">
                            <img src="{{ asset('storage/images/' . $image->filename) }}" alt="Image" class="w-32 h-32 object-cover rounded-lg shadow mr-2">
                        </td>
                        <td class="py-2 px-4 text-gray-800">{{ $image->label }}</td>
                        <td class="py-2 px-4 space-x-2">
                            <a href="{{ route('admin.images.edit', $image->id) }}" class="text-yellow-500 hover:underline">Chỉnh sửa</a> |
                            <a href="{{ route('admin.images.delete', $image->id) }}" class="text-red-500 hover:underline" onclick="return confirm('Bạn có chắc chắn muốn xoá không?')">Xoá</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mb-4">
        <a href="{{ route('admin.images.create') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-300 transition duration-200">Tải lên trường phái</a>
        <a href="{{ url('/home') }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-200 ml-4">Quay lại</a>
    </div>
</div>
