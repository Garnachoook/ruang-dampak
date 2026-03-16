@props(['type' => 'primary'])

@php
    $types = [
        'primary' => 'bg-primary-100 text-primary-600',
        'success' => 'bg-emerald-100 text-emerald-700',
        'warning' => 'bg-amber-100 text-amber-700',
        'neutral' => 'bg-neutral-100 text-neutral-600',
    ];

    $classes = 'inline-flex items-center px-4 py-1.5 rounded-full text-xs font-display font-bold tracking-wide uppercase ' . ($types[$type] ?? $types['primary']);
@endphp

<span {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</span>