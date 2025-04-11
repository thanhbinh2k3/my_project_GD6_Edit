<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\Session;

class UserPlanController extends Controller
{
    public function index()
    {
        $plans = Plan::all();
        $currentPlanId = Session::get('selected_plan_id');
        return view('user.plans', compact('plans', 'currentPlanId'));
    }

    public function register($id)
    {
        Session::put('selected_plan_id', $id);
        return redirect()->route('user.plans')->with('success', 'Đăng ký gói thành công!');
    }
}

