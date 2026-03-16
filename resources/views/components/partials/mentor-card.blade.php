@props([
    'mentor',
])

@php
    $profile = $mentor->mentorProfile;
@endphp

<x-ui.card class="h-full flex flex-col text-center p-6 group hover:-translate-y-1 transition-transform duration-300">
    <div class="mx-auto mb-4 relative">
        <x-ui.avatar name="{{ $mentor->name }}" src="{{ $mentor->avatar_url }}" size="lg" class="w-20 h-20 shadow-md" />
        
        <div class="absolute -bottom-2 -right-2 bg-white rounded-full p-1 shadow-sm border border-neutral-100 flex items-center gap-1 px-2 text-xs font-display font-bold text-accent-amber">
            <svg class="w-3 h-3 text-accent-amber fill-current" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
            {{ number_format($profile?->averageRating() ?? 0, 1) }}
        </div>
    </div>
    
    <h3 class="font-display font-bold text-lg text-primary-900 truncate" title="{{ $mentor->name }}">
        {{ $mentor->name }}
    </h3>
    
    <p class="font-body text-sm text-neutral-500 mb-4 line-clamp-2" title="{{ $profile?->headline }}">
        {{ $profile?->headline ?? 'Mentor di Ruang Dampak' }}
    </p>
    
    <div class="mt-auto">
        <div class="flex flex-wrap justify-center gap-2 mb-4">
            @if($profile && is_array($profile->skills))
                @foreach(array_slice($profile->skills, 0, 3) as $skill)
                    <x-ui.badge color="neutral" class="text-[10px] px-2 py-0.5">{{ $skill }}</x-ui.badge>
                @endforeach
                @if(count($profile->skills) > 3)
                    <span class="text-xs text-neutral-400 font-body items-center flex">+{{ count($profile->skills) - 3 }}</span>
                @endif
            @endif
        </div>
        
        <x-ui.button variant="ghost" class="w-full text-sm py-2">Lihat Profil</x-ui.button>
    </div>
</x-ui.card>
