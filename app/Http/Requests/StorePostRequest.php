<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePostRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép thực hiện request này hay không.
     * Chỉ cho phép Admin truy cập.
     */
    public function authorize(): bool
    {
        // Kiểm tra xem người dùng đã đăng nhập và có role là 'admin' hay không
        return Auth::check() && Auth::user()->role === 'admin';
    }

    /**
     * Định nghĩa các quy tắc xác thực (validation rules) áp dụng cho request.
     */
    public function rules(): array
    {
        return [
            // Tiêu đề: bắt buộc, string, tối đa 255 ký tự, duy nhất trong bảng posts
            'title' => ['required', 'string', 'max:255', 'unique:posts,title'],
            
            // Nội dung: bắt buộc, string, tối thiểu 50 ký tự
            'content' => ['required', 'string', 'min:50'],
            
            // Slug (tùy chọn): để tiện cho việc lưu trữ
            'slug' => ['nullable', 'string', 'max:255', 'unique:posts,slug'],
        ];
    }
    
    /**
     * Định nghĩa các thông báo lỗi tùy chỉnh bằng tiếng Việt.
     */
    public function messages()
    {
        return [
            'title.required' => 'Tiêu đề bài viết không được để trống.',
            'title.unique' => 'Tiêu đề này đã tồn tại trong hệ thống.',
            'content.required' => 'Nội dung bài viết là bắt buộc.',
            'content.min' => 'Nội dung phải có ít nhất :min ký tự.',
        ];
    }
}
