<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    // Show the file upload form
    public function create()
    {
        return view('admin.files.upload'); // Make sure you have this view file
    }

    // Handle the file upload
    public function store(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240', // example validation
        ]);

        // Store the uploaded file
        $path = $request->file('file')->store('uploads', 'public'); // Store the file in the 'uploads' directory

        // You can do something with the path or return a success message
        return back()->with('success', 'File uploaded successfully!');
    }
}
