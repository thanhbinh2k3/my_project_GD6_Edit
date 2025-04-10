@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 mb-4 rounded shadow">
        {{ session('success') }}
    </div>
@endif

<div class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold mb-4 text-red-600">Xác nhận xóa trường phái</h2>

    <p class="mb-4 text-gray-800">Bạn có chắc chắn muốn xóa trường phái <strong>{{ $image->label }}</strong>?</p>

    <div class="flex items-center space-x-4">
        <form action="{{ route('admin.images.destroy', $image->id) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit" class="inline-block bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition duration-200">Xóa</button>
        </form>

        <a href="{{ route('admin.images.index') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition duration-200">Quay lại</a>
    </div>
</div>
