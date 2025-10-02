<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Định nghĩa class cho hiệu ứng gradient trên số 404 */
        .text-gradient {
            background-clip: text;
            -webkit-background-clip: text;
            color: transparent;
            /* Gradient từ Indigo sang Violet */
            background-image: linear-gradient(45deg, #4f46e5, #9333ea); 
        }
    </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen font-sans">
    <div class="w-full max-w-lg mx-auto">
        <div class="text-center p-10 bg-white shadow-2xl rounded-xl border border-gray-100 transform transition duration-500 hover:scale-[1.01]">
            
            <!-- Icon/Illustration đơn giản -->
            <div class="mb-6">
                <svg class="w-20 h-20 mx-auto text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <!-- Biểu tượng cảnh báo hoặc liên kết bị hỏng -->
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>

            <!-- Số 404 với hiệu ứng Gradient -->
            <h1 class="text-8xl font-extrabold text-gradient mb-2">404</h1>
            
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Không tìm thấy trang</h2>
            
            <p class="text-gray-500 mb-8 max-w-sm mx-auto">
                Rất tiếc, đường dẫn bạn đang tìm kiếm có thể đã bị xóa, đổi tên hoặc chưa từng tồn tại.
            </p>
            
            <!-- Nút Call to Action nổi bật -->
            <a href="/" class="inline-flex items-center justify-center 
                              bg-indigo-600 hover:bg-indigo-700 
                              text-white font-semibold 
                              py-3 px-6 
                              rounded-xl 
                              shadow-lg shadow-indigo-300/50 
                              transition duration-300 ease-in-out 
                              transform hover:scale-[1.05] focus:outline-none focus:ring-4 focus:ring-indigo-300">
                Quay lại Trang chủ
            </a>

            <!-- Link phụ -->
            <div class="mt-4">
                <a href="/admin/dashboad" class="text-sm text-gray-400 hover:text-indigo-600 transition">
                    Thử truy cập trang Quản trị
                </a>
            </div>
        </div>
    </div>
</body>
</html>
