@extends('layouts.admin')

@section('title', 'Tạo Bài viết Mới')
@section('page_title', 'Tạo Bài viết Mới')

@section('content')

    <div class="bg-white p-6 rounded-lg shadow max-w-3xl mx-auto">
        
        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf 

            <!-- Trường Tiêu đề -->
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Tiêu đề</label>
                <input type="text" id="title" name="title" value="{{ old('title') }}" autofocus
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('title') border-red-500 @enderror">
                
                @error('title')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Trường Slug (Tùy chọn) -->
            <div class="mb-4">
                <label for="slug" class="block text-gray-700 text-sm font-bold mb-2">Slug (Tùy chọn)</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug') }}"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('slug') border-red-500 @enderror">
                @error('slug')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Trường Nội dung -->
            <div class="mb-6">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Nội dung</label>
                <textarea id="content" name="content" rows="10"
                          class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-indigo-500 @error('content') border-red-500 @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150">
                    Lưu Bài viết
                </button>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <!-- Giả định sử dụng JS để tự động tạo slug -->
    <script>
        document.getElementById('title').addEventListener('input', function() {
            let title = this.value;
            let slugInput = document.getElementById('slug');
            
            // Hàm đơn giản hóa slug
            if (slugInput.value === '') {
                 // Chỉ tự động tạo slug nếu người dùng chưa nhập gì vào trường slug
                slugInput.value = title.toLowerCase()
                    .replace(/[^a-z0-9\s-]/g, '') // Loại bỏ ký tự đặc biệt
                    .trim()
                    .replace(/\s+/g, '-'); // Thay khoảng trắng bằng gạch ngang
            }
        });
    </script>
@endpush
