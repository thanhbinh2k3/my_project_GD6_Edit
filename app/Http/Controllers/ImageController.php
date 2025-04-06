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
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'label' => 'required|string|max:255',
        ]);

        try {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = time() . '_' . $file->getClientOriginalName();

                // Lưu ảnh vào storage/app/public/images
                $path = $file->storeAs('images', $fileName, 'public');

                // Ghi vào DB
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
            $image = Image::findOrFail($id);

            // Xoá file ảnh nếu tồn tại
            if (Storage::disk('public')->exists('images/' . $image->file_name)) {
                Storage::disk('public')->delete('images/' . $image->file_name);
            }

            // Xoá record trong DB
            $image->delete();

            return redirect()->route('admin.images.index')->with('success', 'Ảnh đã được xoá!');
        } catch (\Exception $e) {
            Log::error('Lỗi xoá ảnh', ['error' => $e->getMessage()]);
            return back()->with('error', 'Không thể xoá ảnh. Vui lòng thử lại!');
        }
    }
}
