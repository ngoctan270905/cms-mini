@extends('layouts.admin')

@section('title', 'Quản lý Bài viết')
@section('page_title', 'Danh sách Bài viết')

@section('content')
    
    @if (session('success'))
        <x-alert type="success" :message="session('success')"/>
    @endif

    <a href="{{ route('admin.posts.create') }}">Tạo bài viết mới</a>
    
    <table border="1" width="100%" style="margin-top: 20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Slug</th>
                <th>Người tạo</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route('admin.posts.show', $post->slug) }}">{{ $post->slug }}</a></td>
                    <td>{{ $post->user->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('admin.posts.show', $post->slug) }}">Xem</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Không có bài viết nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

@endsection