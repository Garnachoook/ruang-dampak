@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button'
])

@php
    $baseClasses = 'inline-flex items-center justify-center font-display font-semibold transition-all duration-300 disabled:opacity-50 rounded-full active:scale-95';

    $variants = [
        'primary' => 'bg-primary-950 text-white hover:bg-primary-800 shadow-lg shadow-primary-950/10',
        'outline' => 'border border-neutral-200 text-neutral-700 bg-white hover:bg-neutral-50 hover:border-neutral-300',
        'accent'  => 'bg-primary-600 text-white hover:bg-primary-700 shadow-lg shadow-primary-600/20',
    ];

    $sizes = [
        'sm' => 'px-5 py-2 text-sm',
        'md' => 'px-8 py-3.5 text-base',
        'lg' => 'px-10 py-4 text-lg',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']) . ' ' . ($sizes[$size] ?? $sizes['md']);
@endphp

<button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</button>