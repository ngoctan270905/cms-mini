# 📘 CMS Mini - Laravel Routing & Middleware Architecture

## 💼 Giới Thiệu Dự Án
Dự án **CMS Mini** tập trung vào việc xây dựng **module quản lý bài viết (Post) và người dùng** trên nền tảng Laravel.  
Mục tiêu là áp dụng các chuẩn kiến trúc nâng cao của Laravel như:
- **Resource Routing**
- **Custom Middleware**
- **Form Request Validation**
- **Route Model Binding**
- **Blade Template Components**

## 🧩 Bối Cảnh & Mục Tiêu
- Bảo mật khu vực quản trị (`/admin`) chỉ dành cho người dùng có vai trò `admin`.  
- Áp dụng các **design patterns** tiêu chuẩn của Laravel để đảm bảo **tính mở rộng** và **dễ bảo trì**.

---

## 📚 Kiến Trúc Triển Khai

### 1️⃣ Routing Nâng Cao (Phần 1)
| Yêu cầu | Chi tiết triển khai |
|---------|----------------------|
| **Route Group** | Prefix `/admin`, Middleware `auth` và `check.role:admin`. |
| **Resource Controller** | `Route::resource('posts', PostController::class)->only(['index', 'create', 'store', 'show']);` |
| **Named Routes** | `admin.posts.index`, `admin.posts.create`, ... |
| **Route Model Binding** | `/admin/posts/{post:slug}` (binding theo slug). |
| **Route Fallback** | `Route::fallback(fn() => response()->view('errors.404', [], 404));` |

---

### 2️⃣ Blade Template Nâng Cao (Phần 2)
| Yêu cầu | Chi tiết triển khai |
|---------|----------------------|
| **Layout Chung** | `resources/views/layouts/admin.blade.php` sử dụng `@yield('content')`, `@stack('scripts')`. |
| **Blade Component** | `resources/views/components/alert.blade.php` với `@props(['type' => 'success', 'message'])`. |
| **Blade Directives** | `@auth`, `@guest`, `@if(Auth::user()->role === 'admin')`. |
| **Form Handling** | Sử dụng `@csrf` và `@error('field_name')` để hiển thị lỗi. |

---

### 3️⃣ Controllers, Middleware, Request (Phần 3)
| Yêu cầu | Chi tiết triển khai |
|---------|----------------------|
| **PostController** | Resource Controller: `index`, `create`, `store`, `show`. |
| **DashboardController** | Single Action Controller: trả về `view('admin.dashboard')`. |
| **Middleware CheckRole** | Kiểm tra `auth()->check()` && `auth()->user()->role === $role`. |
| **Form Request** | `StorePostRequest` dùng cho `PostController@store`. |
| **Validation Rules** | `title` (required, unique, max:255), `content` (min:50). |

---

## ✅ Testing Guide (Kết Quả Kiểm Thử)

| URL | Middleware yêu cầu | Kết quả mong muốn |
|-----|--------------------|-------------------|
| `/login` | guest | Hiển thị form đăng nhập. |
| `/admin/posts` | auth, check.role:admin | Danh sách bài viết (chỉ admin mới truy cập). |
| `/admin/posts/create` | auth, check.role:admin | Form tạo bài viết (có layout, CSRF, validation). |
| `/admin/posts/{slug}` | auth, check.role:admin | Chi tiết bài viết (Route Model Binding theo slug). |
| `/invalid-path` | - | Hiển thị trang lỗi `404` tùy chỉnh. |

---

## ⚡ Hướng Dẫn Thiết Lập Nhanh

1. Đảm bảo cột `role` tồn tại trong bảng `users` với giá trị mặc định là `'user'`.  
2. Tạo ít nhất một tài khoản trong DB, sau đó cập nhật `role = 'admin'`.  
3. Đăng ký middleware **CheckRole** trong `app/Http/Kernel.php` (dưới dạng route middleware).  
   ```php
   protected $routeMiddleware = [
       'check.role' => \App\Http\Middleware\CheckRole::class,
   ];
