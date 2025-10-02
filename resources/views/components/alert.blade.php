@props(['type' => 'success', 'message' => ''])

@php
    // Định nghĩa class CSS dựa trên loại thông báo
    $class = match ($type) {
        'success' => 'alert-success',
        'error' => 'alert-error',
        'warning' => 'alert-warning',
        default => 'alert-info',
    };
@endphp

<div {{ $attributes->merge(['class' => 'alert ' . $class, 'style' => 'padding: 10px; border: 1px solid; margin-bottom: 15px;']) }}>
    <strong>[{{ strtoupper($type) }}]</strong> {{ $message }}
    
    {{ $slot }}
</div>