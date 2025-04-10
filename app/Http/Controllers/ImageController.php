<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageController extends Controller
{
    /**
     * Hiển thị danh sách ảnh đã upload
     */
    public function index()
    {
        $images = Image::latest()->get(); // sắp xếp mới nhất trước
        return view('admin.images.index', compact('images'));
    }

    /**
     * Hiển thị form tạo ảnh mới
     */
    public function create()
    {
        return view('admin.images.create');
    }

    /**
     * Xử lý lưu ảnh upload
     */

     public function edit($id)
    {
        try {
            // Tìm ảnh theo ID
            $image = Image::findOrFail($id);

            // Trả về view chỉnh sửa ảnh với dữ liệu ảnh
            return view('admin.images.edit', compact('image'));
        } catch (\Exception $e) {
            Log::error('Lỗi tìm ảnh để chỉnh sửa', ['error' => $e->getMessage()]);
            return back()->with('error', 'Không thể tìm ảnh. Vui lòng thử lại!');
        }
    }

     public function update(Request $request, $id)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'label' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // ảnh có thể không được thay đổi
        ]);

        try {
            // Tìm ảnh theo ID
            $image = Image::findOrFail($id);

            // Cập nhật trường phái (label)
            $image->label = $request->input('label');

            // Nếu có ảnh mới được chọn, xử lý upload ảnh mới
            if ($request->hasFile('file')) {
                // Xóa ảnh cũ nếu có
                if (Storage::disk('public')->exists('images/' . $image->filename)) {
                    Storage::disk('public')->delete('images/' . $image->filename);
                }

                // Lưu ảnh mới
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $fileName, 'public');

                // Cập nhật tên ảnh mới trong DB
                $image->filename = $fileName;
            }

            // Lưu thông tin cập nhật vào DB
            $image->save();

            return redirect()->route('admin.images.index')->with('success', 'Cập nhật trường phái thành công!');
        } catch (\Exception $e) {
            Log::error('Lỗi cập nhật ảnh', ['error' => $e->getMessage()]);
            return back()->with('error', 'Đã xảy ra lỗi khi cập nhật trường phái. Vui lòng thử lại!');
        }
    }

    public function store(Request $request)
    {
        try {
            // Validate dữ liệu nhập
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'label' => 'required|string|max:255',
            ]);

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('images', $fileName, 'public');

                Image::create([
                    'filename' => $fileName,
                    'label' => $request->label,
                ]);

                return redirect()->route('admin.images.index')->with('success', 'Tải ảnh thành công!');
            }

            return back()->with('error', 'Không có ảnh được chọn.');
        } catch (\Exception $e) {
            Log::error('Lỗi upload ảnh', ['error' => $e->getMessage()]);
            return back()->with('error', 'Đã xảy ra lỗi khi tải ảnh lên. Vui lòng thử lại!');
        }
    }


    /**
     * Xoá ảnh khỏi hệ thống
     */
    public function destroy($id)
    {
        try {
            $image = Image::findOrFail($id); // Lấy ảnh từ DB theo ID

            // Xoá file ảnh trong thư mục public nếu tồn tại
            if (Storage::disk('public')->exists('images/' . $image->filename)) {
                Storage::disk('public')->delete('images/' . $image->filename);
            }

            // Xoá bản ghi ảnh trong DB
            $image->delete();

            return redirect()->route('admin.images.index')->with('success', 'Ảnh đã được xoá!');
        } catch (\Exception $e) {
            Log::error('Lỗi xoá ảnh', ['error' => $e->getMessage()]);
            return back()->with('error', 'Không thể xoá ảnh. Vui lòng thử lại!');
        }
    }
}
