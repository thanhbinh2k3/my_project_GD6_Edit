<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = strtolower($request->input('query'));
        $json = Storage::get('data/artworks.json');
        $data = json_decode($json, true);

        // Tìm kiếm theo title hoặc style
        $results = collect($data)->filter(function ($item) use ($query) {
            return str_contains(strtolower($item['title']), $query) ||
                   str_contains(strtolower($item['style']), $query);
        });

        return view('user.search_results', [
            'results' => $results,
            'query' => $request->input('query') // ✅ Lấy đúng chuỗi người dùng nhập
        ]);        
    }
}
