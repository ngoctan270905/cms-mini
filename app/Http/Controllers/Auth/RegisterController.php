<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function create()
    {
        return view('auth.register');
    }

    // Xử lý logic đăng ký user mới
    public function store(Request $request)
    {
        // 1. Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            // Custom messages
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]);

        // 2. Tạo User mới
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // Thêm role mặc định cho user thường
            'role' => 'user', 
        ]);

        // 3. Đăng nhập ngay sau khi đăng ký (Optional)
        Auth::login($user);

        // 4. Chuyển hướng về trang Dashboard
        return redirect('/dashboard'); 
    }
}