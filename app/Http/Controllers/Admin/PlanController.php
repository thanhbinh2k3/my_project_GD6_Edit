<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::orderBy('created_at', 'desc')->get();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer|min:1',
        ]);

        Plan::create($request->only(['name', 'description', 'price', 'duration_days']));

        return redirect()->route('admin.plans.index')->with('success', 'Gói đã được tạo');
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'duration_days' => 'required|integer|min:1',
        ]);

        $plan = Plan::findOrFail($id);
        $plan->update($request->only(['name', 'description', 'price', 'duration_days']));

        return redirect()->route('admin.plans.index')->with('success', 'Gói đã cập nhật');
    }

    public function destroy($id)
    {
        Plan::destroy($id);
        return redirect()->back()->with('success', 'Gói đã xoá');
    }
}
