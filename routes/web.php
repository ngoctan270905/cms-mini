<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Trang chủ
Route::get('/', function () {
    return view('welcome');
});

// Form Đăng ký
Route::get('/register', [RegisterController::class, 'create'])->name('register');
// Xử lý Đăng ký
Route::post('/register', [RegisterController::class, 'store']);
// Form Đăng nhập
Route::get('/login', [LoginController::class, 'create'])->name('login')->middleware('guest');
// Xử lý Đăng nhập
Route::post('/login', [LoginController::class, 'store']);
// Xử lý Đăng xuất
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout')->middleware('auth');

// Route group dành cho admin
Route::middleware(['auth', 'check.role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Dashboard admin
        Route::get('dashboard', DashboardController::class)
            ->name('dashboard');

        // Resource route cho PostController
        // Chỉ dùng: index, create, store, show
        Route::resource('posts', PostController::class)
            ->only(['index', 'create', 'store', 'show']);
    });

// Route fallback cho tất cả đường dẫn không tồn tại
Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
