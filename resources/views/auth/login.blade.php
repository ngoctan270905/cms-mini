<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập Hệ Thống</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Đăng Nhập Quản Trị</h2>

            <!-- Hiển thị lỗi chung (nếu có lỗi xác thực ngoài lỗi trường input) -->
            @if ($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded" role="alert">
                    <p class="font-bold">Lỗi Đăng Nhập</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            @if ($loop->index < 1) 
                                <!-- Chỉ hiển thị lỗi đầu tiên, thường là lỗi email/password không hợp lệ -->
                                <li>{{ $error }}</li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="/login">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror">
                    @error('email') 
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Mật khẩu -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu</label>
                    <input id="password" type="password" name="password" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror">
                    @error('password') 
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> 
                    @enderror
                </div>
                
                <!-- Ghi nhớ đăng nhập (Remember Me) -->
                <div class="mb-6 flex items-center justify-between">
                    <label class="block text-gray-500 font-bold">
                        <input type="checkbox" name="remember" id="remember" class="mr-2 leading-tight">
                        <span class="text-sm">Ghi nhớ đăng nhập</span>
                    </label>
                    
                    <!-- Link Quên mật khẩu (Tùy chọn) -->
                    <a href="#" class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800">
                        Quên mật khẩu?
                    </a>
                </div>


                <!-- Nút Đăng Nhập -->
                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out w-full">
                        Đăng Nhập
                    </button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <a href="/register" class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800">
                    Chưa có tài khoản? Đăng ký ngay
                </a>
            </div>
        </div>
        <p class="text-center text-gray-500 text-xs">
            &copy;2025 CMS Mini Project.
        </p>
    </div>

</body>
</html>
