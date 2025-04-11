<?php

use App\Http\Controllers\UserController_2;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;  // Đảm bảo đã import LoginController
use App\Http\Controllers\Admin\UserController;  // Không cần alias nữa
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController_2;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\UserController_2 as UC;
use App\Http\Controllers\Admin\RevenueController;
use App\Http\Controllers\User\PostController_2;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\User\StyleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UserPlanController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\FileController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\User\SearchController;
use App\Http\Controllers\PredictController;

Route::get('/predict', [PredictController::class, 'index'])->name('user.predict');


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

//Route::get('/', function () {
 //   return redirect()->route('login');
//});
// Trang chủ cho khách
Route::get('/', function () {
    return view('home_2');
})->name('home');

Route::get('/gioi_thieu', function () {
    return view('gioi_thieu'); // Trang này sẽ trả về view gioi_thieu.blade.php
});



Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLogin'])->name('login'); // Route cho trang đăng nhập
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Route xử lý đăng nhập
Route::get('/user_home', [UserHomeController::class, 'index'])->name('user.home'); // Route cho trang chủ người dùng


Route::get('/user/posts_2', [PostController_2::class, 'index'])->name('user.posts.index_2');
Route::get('/user/profile', [UserHomeController::class, 'profile'])->name('user.profile');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController_2::class, 'index'])->name('dashboard');
});


Route::get('/user/posts', [PostController_2::class, 'index_2'])->name('user.posts');

// Define the resource route for user
//Route::resource('user', UC::class);

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


Route::get('/search', [SearchController::class, 'search'])->name('user.search');
// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [UserProfileController::class, 'editProfile'])->name('user.edit_profile');
    Route::post('/profile/update', [UserProfileController::class, 'updateProfile'])->name('user.update_profile');

    Route::get('/profile/change_password', [UserProfileController::class, 'changePassword'])->name('user.change_password');
    Route::post('/profile/update_password', [UserProfileController::class, 'updatePassword'])->name('user.update_password');
});

Route::post('/admin/images', [ImageController::class, 'store'])->name('admin.images.store');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('images/create', [ImageController::class, 'create'])->name('images.create');
});

Route::prefix('admin/images')->name('admin.images.')->group(function () {
    Route::get('/', [ImageController::class, 'index'])->name('index');    
    Route::get('/{id}/edit', [ImageController::class, 'edit'])->name('edit'); // nếu có
    Route::put('/{id}', [ImageController::class, 'update'])->name('update'); // Route xử lý cập nhật
    Route::get('/{id}/delete', [ImageController::class, 'destroy'])->name('delete');
});

Route::get('/admin/revenue', [RevenueController::class, 'index'])->name('admin.revenue');

// Các route trong đây sẽ được bảo vệ bởi auth middleware
Route::middleware('auth')->group(function () {

    Route::middleware(['auth'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
    });

    // Route Dashboard
    Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController_2::class, 'index'])->name('dashboard');
    });

    Route::get('/user/plans', [UserPlanController::class, 'index'])->name('user.plans');
    Route::post('/user/plans/register/{id}', [UserPlanController::class, 'register'])->name('user.plans.register');

    // Quản lý User
    //Route::resource('/admin/user', UserController_2::class);  // Sử dụng UserController cho các route admin users
    Route::resource('user', App\Http\Controllers\UserController_2::class);

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
    //Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Đăng xuất và chuyển hướng đến trang chủ
    Route::post('/logout', function () {
        Auth::logout();
        return redirect('http://127.0.0.1:8000'); // Chuyển hướng về trang chủ
    })->name('logout');

    //Route::prefix('user')->name('user.')->group(function () {
     //   Route::get('/user/plans', [VipController::class, 'index'])->name('user.plans.index');
      //  Route::post('/user/plans/register', [VipController::class, 'register'])->name('user.plans.register');
    //});
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
Route::get('/user/styles', [App\Http\Controllers\User\StyleController::class, 'index'])->name('user.styles');

Route::middleware(['auth'])->group(function () {
    Route::get('/styles/reset-views', [StyleController::class, 'resetViews'])->name('user.styles.resetViews'); // <-- đặt lên trên
    Route::get('/styles', [StyleController::class, 'index'])->name('user.styles.index');
    Route::get('/styles/search', [StyleController::class, 'index'])->name('user.search');
    Route::get('/styles/{id}', [StyleController::class, 'show'])->name('user.styles.show');
    Route::post('/styles/{id}/like', [StyleController::class, 'like'])->name('user.styles.like');
});




// Các route user phía sau
Route::resource('user', UserController_2::class);


