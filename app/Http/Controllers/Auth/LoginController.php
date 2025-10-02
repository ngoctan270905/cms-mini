<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Hiển thị form đăng nhập
    public function create()
    {
        return view('auth.login');
    }

    // Xử lý logic đăng nhập
    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // 2. Thử đăng nhập
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Chuyển hướng người dùng về trang đích (hoặc trang dashboard mặc định)
            return redirect()->intended('admin/dashboard'); 
        }

        // 3. Đăng nhập thất bại
        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không hợp lệ.',
        ])->onlyInput('email');
    }
    
    // Xử lý logic đăng xuất
    public function destroy(Request $request)
    {
        Auth::logout(); // Xóa phiên đăng nhập

        $request->session()->invalidate(); // Hủy toàn bộ session
        $request->session()->regenerateToken(); // Tạo lại CSRF token mới

        return redirect('/'); // Chuyển hướng về trang chủ
    }
}