@props([
    'job',
])

@php
    $mitra = $job->mitra->mitraProfile ?? null;
@endphp

<x-ui.card class="h-full flex flex-col p-6 group hover:border-primary-300 transition-colors duration-300">
    <div class="flex items-start gap-4 mb-4">
        <div class="w-12 h-12 rounded-xl bg-neutral-100 border border-neutral-200 flex items-center justify-center shrink-0 overflow-hidden">
            @if($mitra && $mitra->company_logo_url)
                <img src="{{ $mitra->company_logo_url }}" alt="{{ $mitra->company_name }}" class="w-full h-full object-contain">
            @else
                <span class="font-display font-bold text-neutral-400 text-sm">{{ substr($mitra?->company_name ?? 'M', 0, 1) }}</span>
            @endif
        </div>
        
        <div class="flex-1 min-w-0">
            <h3 class="font-display font-bold text-lg text-primary-900 truncate" title="{{ $job->title }}">
                {{ $job->title }}
            </h3>
            <p class="font-body text-sm text-neutral-600 truncate">
                {{ $mitra?->company_name ?? 'Perusahaan Mitra' }}
            </p>
        </div>
    </div>
    
    <div class="flex flex-wrap gap-2 mb-4">
        @if($job->type === 'full-time')
            <x-ui.badge color="primary">Full-Time</x-ui.badge>
        @elseif($job->type === 'part-time')
            <x-ui.badge color="teal">Part-Time</x-ui.badge>
        @else
            <x-ui.badge color="amber">Internship</x-ui.badge>
        @endif
        
        @if($job->is_remote)
            <x-ui.badge color="emerald">Remote</x-ui.badge>
        @else
            <x-ui.badge color="neutral">On-site</x-ui.badge>
        @endif
    </div>
    
    <div class="mt-auto flex items-center justify-between text-sm font-body">
        <span class="text-neutral-500 flex items-center gap-1.5 truncate">
            <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            {{ $job->location ?? ($job->is_remote ? 'Remote' : 'Tidak disebutkan') }}
        </span>
        
        <x-ui.button variant="ghost" class="shrink-0 text-accent-teal hover:bg-accent-teal/10 hover:text-accent-teal px-3 py-1.5 rounded-lg text-xs">
            Lamar
        </x-ui.button>
    </div>
</x-ui.card>
