<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm ảnh</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-xl mx-auto bg-white p-8 shadow-lg rounded-lg">
        <h2 class="text-xl font-semibold mb-6">Thêm ảnh mới</h2>


        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-6 border-l-4 border-green-500">
                <p>✔ {{ session('success') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded-md mb-6 border-l-4 border-yellow-500">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.images.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Chọn ảnh</label>
                <input type="file" name="image" id="image" class="block w-full border p-2 rounded-md" required>
            </div>

            <div>
                <label for="label" class="block text-sm font-medium text-gray-700 mb-2">Trường phái</label>
                <input type="text" name="label" id="label" class="block w-full border p-2 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">Tải lên</button>
        </form>

    </div>
</body>
</html>
