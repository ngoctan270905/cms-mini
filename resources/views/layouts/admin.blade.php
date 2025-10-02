<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'Quản Trị')</title>

    @stack('styles')
</head>

<body>

    <header id="header">
        <nav>
            <h1>Admin Header</h1>

            <p>
                @auth

                    @if (Auth::user()->role === 'admin')
                        Chào mừng, Quản trị viên {{ Auth::user()->name }} |
                    @else
                        Chào mừng, User {{ Auth::user()->name }} |
                    @endif

                <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit">Đăng xuất</button>
                </form>

            @endauth

            @guest
                Khách truy cập | <a href="{{ route('login') }}">Đăng nhập</a>
            @endguest
            </p>
        </nav>
    </header>

    <div id="wrapper" style="display: flex;">
        <aside id="sidebar" style="width: 20%; padding: 15px; border-right: 1px solid #ccc;">
            <h3>Menu</h3>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Quản lý Sản phẩm</a></li>
                <li><a href="#">Quản lý Người dùng</a></li>
            </ul>
        </aside>

        <main id="content" style="width: 80%; padding: 15px;">
            <h2>@yield('page_title')</h2>

            @yield('content')
        </main>
    </div>

    <footer id="footer" style="text-align: center; padding: 10px; border-top: 1px solid #ccc;">
        <p>&copy; 2025 Admin Dashboard Footer</p>
    </footer>

    @stack('scripts')

    @push('scripts')
        <script>
            console.log('Script chung từ layout admin.');
        </script>
    @endpush

</body>

</html>
