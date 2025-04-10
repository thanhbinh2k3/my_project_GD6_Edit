<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictController extends Controller
{
    public function index()
    {
        return view('user.predict'); // Trả về trang view dự đoán
    }
}
