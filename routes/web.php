<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;  // Đảm bảo đã import LoginController
use App\Http\Controllers\Admin\UserController;  // Không cần alias nữa
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController_2;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\UserController_2 as UC;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\DashboardController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Các route này được tải qua RouteServiceProvider trong nhóm middleware "web"
|
*/

// Route trang chủ (có thể thay đổi trang chào mừng nếu cần)
Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController_2::class, 'index'])->name('dashboard');
});

Route::resource('user', UserController::class);  // Sử dụng UserController mà không alias

// Define the resource route for user
Route::resource('user', UC::class);

// Đảm bảo bạn đã khai báo route cho dashboard
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController_2::class, 'index'])->name('dashboard');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
});

//Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //Route::get('/dashboard', [DashboardController_2::class, 'index'])->name('dashboard');
    // This will handle the index route as well
    //Route::resource('posts', PostController::class);  // Automatically generates the admin.posts.index route
//});



// Route đăng nhập và đăng xuất
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');  // Route đăng nhập (GET)
Route::post('/login', [LoginController::class, 'login']);  // Route đăng nhập (POST)
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');  // Route đăng xuất

// Route trang chủ sau khi đăng nhập thành công
Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');  // Bảo vệ trang home, chỉ truy cập được khi đăng nhập

// Các route trong đây sẽ được bảo vệ bởi auth middleware
Route::middleware('auth')->group(function () {
    // Route Dashboard
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController_2::class, 'index'])->name('dashboard');
    });
    

    // Quản lý User
    Route::resource('/admin/users', UserController::class);  // Sử dụng UserController cho các route admin users

    // Quản lý Post
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('posts', PostController::class);
    });

    // Quản lý Page
    Route::resource('/admin/pages', PageController::class);

    // Quản lý File
    // Define the file upload route
    Route::get('/files/upload', [FileController::class, 'create'])->name('file.upload');
    Route::post('/files/upload', [FileController::class, 'store'])->name('file.store');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
