<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post; // Giả định Model Post đã được tạo
use App\Http\Requests\StorePostRequest; // Import Form Request
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * index: Hiển thị danh sách tất cả bài viết.
     */
    public function index()
    {
        // Lấy tất cả bài viết, sắp xếp theo thời gian mới nhất
        // Thêm with('user') để eager load thông tin người tạo (giả sử có mối quan hệ)
        $posts = Post::latest()->get(); 
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * create: Hiển thị form để tạo bài viết mới.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * store: Lưu trữ bài viết mới vào database.
     * Sử dụng StorePostRequest để tự động Validation và Authorization.
     */
    public function store(StorePostRequest $request)
    {
        $validatedData = $request->validated();
        
        // Tự động tạo slug nếu chưa có
        $validatedData['slug'] = Str::slug($validatedData['title']);
        
        // Lưu ID người dùng hiện tại
        $validatedData['user_id'] = Auth::id(); 

        // Tạo bài viết
        Post::create($validatedData);

        return redirect()->route('admin.posts.index')
                         ->with('success', 'Bài viết đã được tạo thành công!');
    }

    /**
     * show: Hiển thị chi tiết một bài viết cụ thể.
     * Dùng Route Model Binding: Laravel tự động tìm Post dựa trên {post:slug}.
     */
    public function show(Post $post) // $post đã được inject qua Route Model Binding
    {
        return view('admin.posts.show', compact('post'));
    }
    
    // Các method edit, update, destroy bị loại bỏ theo yêu cầu của Route::resource()->except()
}
