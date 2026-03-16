@props([
    'label',
    'name',
    'options' => [],
    'variant' => 'light',
    'selected' => null,
])

@php
    $baseWrapperClasses = 'flex flex-col gap-2 relative';
    
    $baseSelectClasses = 'w-full rounded-xl transition-all duration-200 font-body focus:ring-2 focus:outline-none appearance-none';
    
    $variants = [
        'light' => 'bg-white border border-neutral-200 text-neutral-900 focus:border-primary-500 focus:ring-primary-500/20',
        'glass' => 'glass text-white focus:border-white focus:ring-white/30',
    ];

    $selectClasses = $baseSelectClasses . ' ' . ($variants[$variant] ?? $variants['light']);
    
    if ($errors->has($name)) {
        $selectClasses .= ' border-accent-rose focus:border-accent-rose focus:ring-accent-rose/20 box-border border-2';
    }
@endphp

<div class="{{ $baseWrapperClasses }}">
    @if($label)
        <label for="{{ $name }}" class="font-display font-semibold text-sm {{ $variant === 'glass' ? 'text-white' : 'text-neutral-700' }}">
            {{ $label }}
        </label>
    @endif
    
    <div class="relative">
        <select 
            id="{{ $name }}" 
            name="{{ $name }}" 
            {{ $attributes->merge(['class' => $selectClasses]) }}
        >
            @foreach($options as $value => $text)
                <option value="{{ $value }}" {{ (string)$selected === (string)$value ? 'selected' : '' }} class="text-neutral-900 bg-white">
                    {{ $text }}
                </option>
            @endforeach
        </select>
        
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 {{ $variant === 'glass' ? 'text-white' : 'text-neutral-500' }}">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
        </div>
    </div>
    
    @error($name)
        <p class="text-xs font-body text-accent-rose mt-1">{{ $message }}</p>
    @enderror
</div>
