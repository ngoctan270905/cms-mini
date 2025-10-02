<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Đường dẫn "home" mặc định của ứng dụng
     * Thường dùng để redirect sau khi login
     */
    public const HOME = '/dashboard';

    /**
     * Định nghĩa route model binding, pattern filters, ...
     */
    public function boot(): void
    {
        // Route model binding mặc định cho Post
        // Khi route có {post}, Laravel sẽ inject model Post
        Route::model('post', \App\Models\Post::class);

        $this->routes(function () {
            // Load các route web
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));

            // Load các route API
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));
        });

        // Đăng ký middleware custom "check.role"
        // Cho phép gán middleware: ->middleware('check.role:admin')
        Route::aliasMiddleware('check.role', \App\Http\Middleware\CheckRole::class);
    }
}
