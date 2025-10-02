<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

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
