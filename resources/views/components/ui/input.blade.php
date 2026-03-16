@props([
    'name' => null,
    'label' => false, 
    'type' => 'text',
    'id' => null,
    'placeholder' => '',
    'variant' => 'light'
])

@php
    // 1. Lebih aman menggunakan fungsi bawaan Livewire untuk menarik nilai wire:model
    $name = $name ?? $attributes->wire('model')->value();
    
    // 2. Beri fallback uniqid() jika name dan id sama-sama tidak ada
    $inputId = $id ?? $name ?? uniqid('input-');
    
    $baseWrapperClasses = 'flex flex-col gap-1.5 relative';
    
    // 3. Tambahkan padding (px-4 py-3.5) agar input memiliki ruang dan tidak gepeng
    $baseInputClasses = 'w-full px-4 py-3.5 rounded-xl transition-all duration-200 font-body text-sm focus:ring-2 focus:outline-none';
    
    $variants = [
        'light' => 'bg-neutral-50 border border-neutral-200 text-neutral-900 focus:bg-white focus:border-primary-500 focus:ring-primary-500/20 placeholder:text-neutral-400',
        'glass' => 'bg-white/10 backdrop-blur-md border border-white/20 text-white focus:border-white focus:ring-white/30 placeholder:text-white/50',
    ];

    $inputClasses = $baseInputClasses . ' ' . ($variants[$variant] ?? $variants['light']);
    
    // 4. Pastikan $name tidak null sebelum mengecek error agar terhindar dari exception
    if ($name && $errors->has($name)) {
        // Menggunakan standard warna rose Tailwind + !important agar menimpa border bawaan
        $inputClasses .= ' !border-rose-500 !focus:border-rose-500 !focus:ring-rose-500/20 border-2';
    }
@endphp

<div class="{{ $baseWrapperClasses }}">
    @if($label)
        <label for="{{ $name }}" class="font-display font-semibold text-sm {{ $variant === 'glass' ? 'text-white' : 'text-neutral-700' }}">
            {{ $label }}
        </label>
    @endif
    
    <input 
        type="{{ $type }}" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        placeholder="{{ $placeholder }}" 
        {{ $attributes->merge(['class' => $inputClasses]) }}
    >
    
    @error($name)
        <p class="text-xs font-body text-accent-rose mt-1">{{ $message }}</p>
    @enderror
</div>
