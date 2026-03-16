@props([
    'name',
    'src' => null,
    'size' => 'md',
])

@php
    $baseClasses = 'rounded-full flex items-center justify-center font-display font-bold uppercase overflow-hidden shrink-0 border-2 border-white shadow-sm bg-primary-100 text-primary-900';

    $sizes = [
        'sm' => 'w-8 h-8 text-xs',
        'md' => 'w-12 h-12 text-sm',
        'lg' => 'w-16 h-16 text-xl',
    ];

    $sizeClasses = $sizes[$size] ?? $sizes['md'];

    // Get initials (up to 2 letters)
    $initials = collect(explode(' ', trim($name)))
        ->map(fn($part) => substr($part, 0, 1))
        ->take(2)
        ->implode('');
@endphp

<div {{ $attributes->merge(['class' => "$baseClasses $sizeClasses"]) }} title="{{ $name }}">
    @if($src)
        <img src="{{ $src }}" alt="{{ $name }}" class="w-full h-full object-cover">
    @else
        <span>{{ $initials }}</span>
    @endif
</div>
