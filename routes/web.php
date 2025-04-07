<?php

use App\Http\Controllers\UserController_2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;  // Đảm bảo đã import LoginController
use App\Http\Controllers\Admin\UserController;  // Không cần alias nữa
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController_2;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\UserController_2 as UC;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;

use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AuthController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
| Các route này được tải qua RouteServiceProvider trong nhóm middleware "web"
|
*/

// Route trang chủ (có thể thay đổi trang chào mừng nếu cần)
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLogin'])->name('login'); // Route cho trang đăng nhập
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Route xử lý đăng nhập
Route::get('/user_home', [UserHomeController::class, 'index'])->name('user.home'); // Route cho trang chủ người dùng


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
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
});


//Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    //Route::get('/dashboard', [DashboardController_2::class, 'index'])->name('dashboard');
    // This will handle the index route as well
    //Route::resource('posts', PostController::class);  // Automatically generates the admin.posts.index route
//});

// Route đăng nhập và đăng xuất
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');  // Route đăng nhập (GET)
Route::post('/login', [LoginController::class, 'login']);  // Route đăng nhập (POST)
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Change to POST
// Route cho trang chủ người dùng
Route::get('/user_home', [UserHomeController::class, 'index'])->name('user_home'); // Đảm bảo bạn đã tạo controller cho user


// Route cho trang chủ (home) sau khi đăng nhập thành công
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Route cho trang chi tiết người dùng 
//Route::get('/user/{id}', [UserController_2::class, 'show'])->name('user.show'); // Route cho phương thức show

// Route cho trang home Route::get('/home', [User Controller_2::class, 'home'])->name('user.home'); // Route cho phương thức home

// Route đăng nhập và đăng xuất
//Route::get('/login', [LoginController::class, 'showLogin'])->name('login');  // Route đăng nhập (GET)
//Route::post('/login', [LoginController::class, 'login']);  // Route đăng nhập (POST)
//Route::get('/logout', [LoginController::class, 'logout'])->name('logout');  // Route đăng xuất

//Route::get('/home/admin/user/{id}', [UserController_2::class, 'show'])->name('user.show');

Route::get('/forgot_password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot_password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

// Route trang chủ sau khi đăng nhập thành công
//Route::get('/home', function () {
//    return view('home');
//})->name('home');  // Bảo vệ trang home, chỉ truy cập được khi đăng nhập

// routes/web.php

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('images', [ImageController::class, 'index'])->name('images.index');
});



Route::post('/admin/images', [ImageController::class, 'store'])->name('admin.images.store');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('images/create', [ImageController::class, 'create'])->name('images.create');
});

Route::prefix('admin/images')->name('admin.images.')->group(function () {
    Route::get('/', [ImageController::class, 'index'])->name('index');    
    Route::get('/{id}/edit', [ImageController::class, 'edit'])->name('edit'); // nếu có
    Route::get('/{id}/delete', [ImageController::class, 'destroy'])->name('delete');
});

Route::get('/admin/revenue', [RevenueController::class, 'index'])->name('admin.revenue');


// Các route trong đây sẽ được bảo vệ bởi auth middleware
Route::middleware('auth')->group(function () {


    // Route Dashboard
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController_2::class, 'index'])->name('dashboard');
    });


    // Quản lý User
    Route::resource('/admin/user', UserController_2::class);  // Sử dụng UserController cho các route admin users

    Route::prefix('admin')->middleware('auth')->group(function () {
        Route::resource('posts', PostController::class);
    });    
    
    Route::prefix('admin')->group(function () {
        Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
        Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    });

    Route::middleware(['auth', 'admin'])->group(function () {
        // Các route quản lý bài viết
        Route::get('posts/approve/{post}', [PostController::class, 'approve'])->name('posts.approve');
    });

    // Quản lý Page
    Route::resource('/admin/pages', PageController::class);

    // Quản lý File
    // Define the file upload route
    Route::get('/files/upload', [FileController::class, 'create'])->name('file.upload');
    Route::post('/files/upload', [FileController::class, 'store'])->name('file.store');
    
    // Route logout (GET request)
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});



Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Quản lý Plan
    Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
    Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
    Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
    Route::get('/plans/{id}/edit', [PlanController::class, 'edit'])->name('plans.edit');
    Route::put('/plans/{id}', [PlanController::class, 'update'])->name('plans.update');
    Route::delete('/plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');

});
