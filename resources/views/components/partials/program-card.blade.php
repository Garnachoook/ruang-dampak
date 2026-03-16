@props(['program'])

@php
    $activeBatch = $program->batches->where('status', 'open')->first() ?? $program->batches->first();
    $enrolledCount = $activeBatch ? $activeBatch->enrollments->count() : 0;
    $maxSlots = $activeBatch ? $activeBatch->max_slots : 0;
    $isFull = $maxSlots > 0 ? ($enrolledCount >= $maxSlots) : true;
    $remainingPercent = $maxSlots > 0 ? (1 - ($enrolledCount / $maxSlots)) * 100 : 0;
    
    // Mapping Status ke UI Component
    $statusMap = [
        'Penuh' => ['color' => 'rose', 'label' => 'Penuh'],
        'Hampir Penuh' => ['color' => 'primary', 'label' => 'Hampir Penuh'],
        'Buka' => ['color' => 'emerald', 'label' => 'Buka'],
        'Segera' => ['color' => 'amber', 'label' => 'Segera'],
    ];

    $statusKey = 'Segera';
    if($activeBatch) {
        if($isFull) $statusKey = 'Penuh';
        elseif($remainingPercent <= 20) $statusKey = 'Hampir Penuh';
        elseif($activeBatch->status === 'open') $statusKey = 'Buka';
    }
    $currentStatus = $statusMap[$statusKey];
@endphp

<x-ui.card class="flex flex-col h-full group">
    {{-- Thumbnail --}}
    <div class="relative aspect-video overflow-hidden">
        <img src="{{ $program->thumbnail_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
        <div class="absolute top-4 left-4">
            <x-ui.badge :color="$program->type === 'bootcamp' ? 'teal' : 'emerald'">
                {{ $program->type }}
            </x-ui.badge>
        </div>
        <div class="absolute top-4 right-4">
            <x-ui.badge :color="$currentStatus['color']">
                {{ $currentStatus['label'] }}
            </x-ui.badge>
        </div>
    </div>

    {{-- Body --}}
    <div class="p-6 flex-1 flex flex-col gap-4">
        <div>
            <h3 class="font-display font-bold text-primary-900 text-lg leading-tight mb-2">
                {{ $program->title }}
            </h3>
            <div class="flex items-center gap-2">
                <div class="flex text-accent-amber">
                    @for($i=0; $i<5; $i++) <svg class="w-3 h-3 fill-current" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg> @endfor
                </div>
                <span class="text-xs text-neutral-500 font-body">({{ number_format($program->mentor_reviews_avg_rating ?? 5.0, 1) }})</span>
            </div>
        </div>

        @if($activeBatch)
            <x-ui.progress-bar 
                label="{{ $enrolledCount }} / {{ $maxSlots }} slot" 
                :value="(100 - $remainingPercent)" 
                :color="$remainingPercent <= 20 ? 'emerald' : 'primary'"
            />
        @endif

        <div class="mt-auto pt-4 flex items-center justify-between border-t border-neutral-100">
            <div class="flex flex-col">
                @if($program->hasDiscount())
                    <span class="text-[10px] text-neutral-400 line-through">Rp{{ number_format($program->original_price, 0, ',', '.') }}</span>
                @endif
                <span class="text-lg font-display font-bold text-primary-900">Rp{{ number_format($program->price, 0, ',', '.') }}</span>
            </div>
            
            <x-ui.button 
                variant="{{ $statusKey === 'Buka' ? 'primary' : 'outline' }}" 
                size="sm" 
                onclick="window.location.href='{{ route('program.show', $program->slug) }}'"
                wire:navigate
            >
                {{ $statusKey === 'Buka' ? 'Daftar' : 'Detail' }}
            </x-ui.button>
        </div>
    </div>
</x-ui.card>