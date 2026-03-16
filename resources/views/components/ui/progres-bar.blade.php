@props([
    'label' => null,
    'value' => 0,
    'color' => 'primary',
])

@php
    $colors = [
        'primary' => 'bg-primary-500',
        'teal'    => 'bg-accent-teal',
        'emerald' => 'bg-accent-emerald',
    ];

    $barColor = $colors[$color] ?? $colors['primary'];
    
    // Ensure value is between 0 and 100
    $clampedValue = max(0, min(100, (int)$value));
@endphp

<div {{ $attributes->merge(['class' => 'flex flex-col gap-2']) }}>
    @if($label)
        <div class="flex justify-between items-center text-sm font-display font-semibold">
            <span class="text-neutral-700">{{ $label }}</span>
            <span class="text-neutral-500">{{ $clampedValue }}%</span>
        </div>
    @endif
    
    <div class="w-full h-2 bg-neutral-100 rounded-full overflow-hidden">
        <div class="h-full rounded-full transition-all duration-500 {{ $barColor }}" style="width: {{ $clampedValue }}%"></div>
    </div>
</div>
