@props(['post'])

<div class="p-5 md:p-6 bg-white hover:bg-slate-50/80 border-b border-slate-100 last:border-0 transition-colors duration-300 group cursor-pointer">
    <div class="flex items-start gap-4 md:gap-5">
        
        {{-- Avatar dengan ukuran responsif --}}
        <img src="{{ $post->avatar }}" alt="{{ $post->author }}" class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border border-slate-200 shrink-0" loading="lazy">
        
        {{-- Content --}}
        <div class="flex-1 min-w-0">
            
            {{-- Meta Info: Author, Kategori, & Waktu --}}
            <div class="flex flex-wrap items-center gap-2 md:gap-3 mb-2">
                <span class="text-sm font-bold text-slate-900">{{ $post->author }}</span>
                <span class="w-1 h-1 rounded-full bg-slate-300 hidden sm:block"></span>
                <span class="px-2.5 py-0.5 rounded-full text-[10px] md:text-xs font-bold uppercase tracking-wide {{ $post->category_color }}">
                    {{ $post->category }}
                </span>
                <span class="w-1 h-1 rounded-full bg-slate-300 hidden sm:block"></span>
                <span class="text-xs font-medium text-slate-500 hidden sm:block">{{ $post->time }}</span>
            </div>
            
            {{-- Title & Excerpt --}}
            <h4 class="text-lg md:text-xl font-bold text-slate-900 mb-1.5 leading-snug group-hover:text-primary-600 transition-colors duration-200">
                {{ $post->title }}
            </h4>
            <p class="text-sm md:text-base text-slate-600 line-clamp-2 mb-4 leading-relaxed">
                {{ $post->excerpt }}
            </p>
            
            {{-- Stats --}}
            <div class="flex items-center gap-4 md:gap-6 text-sm text-slate-500 font-medium">
                <div class="flex items-center gap-1.5 hover:text-primary-600 transition-colors">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                    <span>{{ $post->replies }} <span class="hidden sm:inline">Balasan</span></span>
                </div>
                <div class="flex items-center gap-1.5 hover:text-rose-600 transition-colors">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path></svg>
                    <span>{{ $post->likes }} <span class="hidden sm:inline">Suka</span></span>
                </div>
                <div class="flex items-center gap-1.5 hover:text-slate-700 transition-colors">
                    <svg class="w-4 h-4 md:w-5 md:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                    <span>{{ number_format($post->views) }} <span class="hidden sm:inline">Dilihat</span></span>
                </div>
                
                {{-- Waktu tayang untuk versi Mobile (Merapat ke kanan) --}}
                <span class="text-[11px] font-normal text-slate-400 ml-auto sm:hidden">{{ $post->time }}</span>
            </div>
            
        </div>
    </div>
</div>