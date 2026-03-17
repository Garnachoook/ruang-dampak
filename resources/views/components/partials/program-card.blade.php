@props(['program'])

<div class="bg-white border border-neutral-200 rounded-xl overflow-hidden group hover:shadow-[0_20px_50px_-12px_rgba(2,47,110,0.1)] hover:border-primary-200 transition-all duration-300 flex flex-col h-full">
    {{-- Thumbnail --}}
    <div class="relative aspect-video overflow-hidden bg-neutral-100">
        <img src="{{ $program->thumbnail_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
        
        {{-- Glassmorphism dihapus, diganti solid white agar kontras dan mematuhi design system --}}
        <div class="absolute top-4 left-4 flex gap-2">
            <span class="px-3 py-1.5 bg-white text-primary-900 rounded-xl text-[10px] font-display font-bold uppercase tracking-wider shadow-sm">
                {{ $program->type }}
            </span>
        </div>
    </div>

    {{-- Content --}}
    <div class="p-6 flex flex-col flex-1">
        <div class="flex items-center gap-2 mb-4">
            <span class="text-[10px] font-display font-bold text-neutral-400 uppercase tracking-widest">{{ $program->category }}</span>
            <span class="w-1 h-1 rounded-full bg-neutral-300"></span>
            <span class="text-[10px] font-display font-bold text-accent-500 uppercase tracking-widest">{{ $program->level }}</span>
        </div>

        {{-- Line clamp digunakan agar tinggi judul seragam maksimal 2 baris --}}
        <h3 class="text-xl font-display font-semibold text-primary-900 mb-2 leading-snug group-hover:text-accent-500 transition-colors line-clamp-2">
            {{ $program->title }}
        </h3>
        
        <div class="mt-auto pt-6 flex items-center justify-between">
            <div class="flex items-center gap-1.5 text-amber-500">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                <span class="text-sm font-display font-bold text-neutral-700">{{ $program->rating }}</span>
                <span class="text-xs text-neutral-400 font-body">({{ $program->total_students }})</span>
            </div>
            <div class="text-right">
                <span class="text-base font-display font-semibold text-primary-900">{{ $program->price }}</span>
            </div>
        </div>
    </div>

    {{-- Link Action (Bottom Bar) --}}
    <a href="{{ route('program.show', $program->id) }}" class="block w-full py-4 bg-neutral-50 group-hover:bg-primary-900 text-center text-sm font-display font-semibold text-neutral-600 group-hover:text-white transition-colors border-t border-neutral-100 group-hover:border-primary-900">
        Lihat Detail Program
    </a>
</div>