@props([
    'label',
    'name',
    'placeholder' => '',
    'rows' => 4,
    'variant' => 'light'
])

@php
    $baseWrapperClasses = 'flex flex-col gap-2 relative';
    
    $baseTextareaClasses = 'w-full rounded-xl transition-all duration-200 font-body focus:ring-2 focus:outline-none resize-y';
    
    $variants = [
        'light' => 'bg-white border border-neutral-200 text-neutral-900 focus:border-primary-500 focus:ring-primary-500/20 placeholder:text-neutral-400',
        'glass' => 'glass text-white focus:border-white focus:ring-white/30 placeholder:text-white/50',
    ];

    $textareaClasses = $baseTextareaClasses . ' ' . ($variants[$variant] ?? $variants['light']);
    
    if ($errors->has($name)) {
        $textareaClasses .= ' border-accent-rose focus:border-accent-rose focus:ring-accent-rose/20 box-border border-2';
    }
@endphp

<div class="{{ $baseWrapperClasses }}">
    @if($label)
        <label for="{{ $name }}" class="font-display font-semibold text-sm {{ $variant === 'glass' ? 'text-white' : 'text-neutral-700' }}">
            {{ $label }}
        </label>
    @endif
    
    <textarea 
        id="{{ $name }}" 
        name="{{ $name }}" 
        placeholder="{{ $placeholder }}" 
        rows="{{ $rows }}"
        {{ $attributes->merge(['class' => $textareaClasses]) }}
    >{{ $slot }}</textarea>
    
    @error($name)
        <p class="text-xs font-body text-accent-rose mt-1">{{ $message }}</p>
    @enderror
</div>
