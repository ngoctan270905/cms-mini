<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Load Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <title>@yield('title', 'Admin Panel')</title>
    
    <!-- @stack('styles') cho CSS riêng -->
    @stack('styles') 
</head>
<body class="bg-gray-50 font-sans antialiased">

    <!-- Header -->
    <header class="bg-indigo-600 shadow-md">
        <div class="max-w-7xl mx-auto py-3 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <h1 class="text-xl font-semibold text-white">CMS Admin</h1>
            
            <p class="text-white text-sm">
                @auth 
                    @if (Auth::user()->role === 'admin')
                        Chào mừng, QTV {{ Auth::user()->name }} | 
                    @else
                        Chào mừng, User {{ Auth::user()->name }} | 
                    @endif 
                    
                    <form method="POST" action="{{ route('logout') }}" class="inline ml-2">
                        @csrf
                        <button type="submit" class="text-indigo-200 hover:text-white transition duration-150">Đăng xuất</button>
                    </form>
                @endauth 

                @guest 
                    Khách truy cập | <a href="{{ route('login') }}" class="text-indigo-200 hover:text-white">Đăng nhập</a>
                @endguest 
            </p>
        </div>
    </header>

    <div class="flex min-h-[calc(100vh-100px)]">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-lg p-4 border-r border-gray-200">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Quản lý</h3>
            <ul>
                <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="block p-2 rounded hover:bg-indigo-100 text-gray-700">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('admin.posts.index') }}" class="block p-2 rounded hover:bg-indigo-100 text-gray-700">Bài viết</a></li>
                <li class="mb-2"><a href="#" class="block p-2 rounded hover:bg-indigo-100 text-gray-700">Người dùng</a></li>
            </ul>
        </aside>

        <!-- Content -->
        <main class="flex-1 p-6">
            <h2 class="text-3xl font-bold text-gray-800 mb-6">@yield('page_title')</h2>

            <!-- Khu vực nội dung chính của trang con -->
            @yield('content')
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow-inner p-4 text-center border-t border-gray-200">
        <p class="text-sm text-gray-600">&copy; 2025 CMS Mini Project.</p>
    </footer>

    <!-- @stack('scripts') cho JavaScript riêng -->
    @stack('scripts')
</body>
</html>
