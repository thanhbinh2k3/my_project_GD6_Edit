<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Image;
use Illuminate\Pagination\LengthAwarePaginator;

class StyleController extends Controller
{
    public function index(Request $request)
    {
        $query = Image::query();

        if ($request->has('query')) {
            $search = $request->query('query');
            $query->where('label', 'like', '%' . $search . '%');
        }

        // Lấy toàn bộ ảnh
        $images = $query->get();

        // Gắn lượt xem từ cache vào từng ảnh
        foreach ($images as $image) {
            $image->views_cache = Cache::get('image_views_' . $image->id, 0);
        }

        // Sắp xếp theo lượt xem giảm dần (cache)
        $sorted = $images->sortByDesc('views_cache');

        // Thực hiện phân trang thủ công
        $perPage = 10;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $pagedData = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->values();
        $styles = new LengthAwarePaginator($pagedData, $sorted->count(), $perPage, $currentPage, [
            'path' => request()->url(),
            'query' => request()->query(),
        ]);

        return view('user.styles.index', compact('styles'));
    }

    public function show($id)
    {
        $image = Image::findOrFail($id);

        // Tăng lượt xem trong cache
        $cacheKey = 'image_views_' . $image->id;
        $views = Cache::get($cacheKey, 0);
        Cache::put($cacheKey, $views + 1, now()->addDays(30)); // giữ cache 30 ngày

        // Tăng lượt xem trong DB
        $image->increment('views');

        return view('user.styles.show', compact('image', 'views'));
    }


    public function resetViews()
    {
        $images = Image::all();

        foreach ($images as $image) {
            // Xoá lượt xem trong cache
            Cache::forget('image_views_' . $image->id);

            // Cập nhật cả 2 cột trong CSDL về 0
            $image->update([
                'views' => 0,
                'likes' => 0,
            ]);
        }

        return redirect()->route('user.styles.index')->with('success', '✅ Đã reset lượt xem và lượt like thành công.');
    }

    public function like($id)
    {
        $image = Image::findOrFail($id);
        $image->increment('likes');

        return back()->with('success', '👍 Bạn đã like ảnh!');
    }
}
