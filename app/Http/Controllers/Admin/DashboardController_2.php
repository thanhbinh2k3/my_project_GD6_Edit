<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController_2 extends Controller
{
    public function index()
    {
        return view('admin.dashboard'); // Đảm bảo bạn có view 'admin.dashboard'
    }
}
