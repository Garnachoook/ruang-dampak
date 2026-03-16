@props([
    'type' => 'info',
])

@php
    $baseClasses = 'p-4 rounded-xl flex items-start gap-3 font-body text-sm border';

    $types = [
        'info'    => 'bg-primary-50 border-primary-200 text-primary-900',
        'success' => 'bg-accent-emerald/10 border-accent-emerald/20 text-accent-emerald',
        'warning' => 'bg-accent-amber/10 border-accent-amber/20 text-accent-amber',
        'error'   => 'bg-accent-rose/10 border-accent-rose/20 text-accent-rose',
    ];

    $icons = [
        'info' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        'success' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
        'warning' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
        'error' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />',
    ];

    $classes = $baseClasses . ' ' . ($types[$type] ?? $types['info']);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} role="alert">
    <svg class="w-5 h-5 shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        {!! $icons[$type] ?? $icons['info'] !!}
    </svg>
    <div class="flex-1">
        {{ $slot }}
    </div>
</div>
