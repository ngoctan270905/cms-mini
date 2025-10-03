@extends('layouts.admin')

@section('title', $post->title)
@section('page_title', 'Chi tiết Bài viết: ' . $post->title)

@section('content')
    
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="text-sm text-gray-500 mb-4">
            <strong>Slug:</strong> {{ $post->slug }}
            <span class="ml-4">|</span>
            <strong>Người tạo:</strong> {{ $post->user->name ?? 'Không xác định' }}
        </div>
        
        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $post->title }}</h3>
        
        <div class="prose max-w-none border-t pt-4">
            <p>{{ $post->content }}</p>
        </div>
    </div>
    
    <div class="mt-6">
        <a href="{{ route('admin.posts.index') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">
            &larr; Quay lại Danh sách Bài viết
        </a>
    </div>

@endsection
