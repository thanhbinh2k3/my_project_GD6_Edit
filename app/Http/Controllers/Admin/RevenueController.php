<?php
// app/Http/Controllers/Admin/RevenueController.php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Revenue;  // Giả sử bạn có một mô hình Revenue để lấy dữ liệu doanh thu
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function index()
    {
        $revenues = Revenue::all();  // Hoặc sử dụng phân trang, filter để lấy doanh thu
        return view('admin.revenue', compact('revenues'));
    }
}
