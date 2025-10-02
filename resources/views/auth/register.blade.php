<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Tài Khoản</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md">
        <div class="bg-white shadow-lg rounded-lg px-8 pt-6 pb-8 mb-4">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Đăng Ký Tài Khoản Mới</h2>

            <form method="POST" action="/register">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Tên</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('name') border-red-500 @enderror">
                    @error('name') 
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('email') border-red-500 @enderror">
                    @error('email') 
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('password') border-red-500 @enderror">
                    @error('password') 
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="mb-6">
                    <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Xác nhận Mật khẩu</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit"
                            class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out w-full">
                        Đăng Ký
                    </button>
                </div>
            </form>

            <div class="mt-4 text-center">
                <a href="/login" class="inline-block align-baseline font-bold text-sm text-indigo-600 hover:text-indigo-800">
                    Đã có tài khoản? Đăng nhập
                </a>
            </div>
        </div>
        <p class="text-center text-gray-500 text-xs">
            &copy;2025 CMS Mini Project.
        </p>
    </div>

</body>
</html>