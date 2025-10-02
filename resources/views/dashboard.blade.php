@extends('layouts.admin')

@section('title', 'Trang chủ Admin')
@section('page_title', 'Dashboard')

@section('content')
    <p>Đây là trang tổng quan dành cho Admin.</p>
    
    <x-alert type="warning" message="Lưu ý: Luôn kiểm tra quyền truy cập trước khi thay đổi dữ liệu."/>
    
@endsection