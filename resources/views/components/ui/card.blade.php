@props(['variant' => 'light'])

@php
    $baseClasses = 'rounded-2xl transition-all duration-300 overflow-hidden';

    $variants = [
        'light' => 'bg-white border border-neutral-100 shadow-sm hover:shadow-xl hover:-translate-y-1',
        'ghost' => 'bg-neutral-50/60 border border-neutral-100',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['light']);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>