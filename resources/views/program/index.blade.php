<x-layout.app>
    <x-slot:title>Jelajahi Program - Ruang Dampak</x-slot:title>

    <div x-data="{ kategori: '{{ request('kategori', 'semua') }}' }" class="bg-neutral-50 min-h-screen pb-20">
        
        {{-- Hero Section (Selaras dengan Beranda) --}}
        <section class="relative bg-white pt-32 pb-28 overflow-hidden border-b border-neutral-200">
            <x-ui.background-pattern />
            
            <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
                <h1 class="font-display font-black text-4xl md:text-6xl text-primary-950 mb-6 tracking-tight leading-[1.1]">
                    Temukan Program yang <br class="hidden md:block" />
                    <span class="text-primary-600">Tepat Untukmu.</span>
                </h1>
                
                <p class="text-lg md:text-xl text-neutral-500 font-body max-w-2xl mx-auto mb-8 leading-relaxed">
                    Akselerasi karirmu melalui kurikulum berbasis industri dan bimbingan langsung dari mentor praktisi berpengalaman.
                </p>
                
                {{-- Status Meta --}}
                <div class="inline-flex items-center gap-2 bg-neutral-100/80 border border-neutral-200 text-neutral-600 px-5 py-2.5 rounded-full text-sm font-display font-semibold shadow-sm backdrop-blur-sm">
                    <svg class="w-4 h-4 text-primary-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    Menampilkan {{ $programs->total() }} program unggulan
                </div>
            </div>
        </section>

        {{-- Filter & Kategori Controls --}}
        <div class="max-w-7xl mx-auto px-4 relative z-20 -mt-12">
            <x-ui.card class="p-4 md:p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] bg-white/95 backdrop-blur-xl border-neutral-200/80 rounded-3xl">
                
                <div class="flex flex-col xl:items-center justify-between gap-6">
                    {{-- Filter Inline Tipe --}}
                    <div class="flex items-center gap-4 shrink-0 px-2 xl:px-0">
                        <span class="text-neutral-800 font-display font-bold uppercase tracking-wider text-[12px]">Tipe:</span>
                        <div class="flex gap-1 bg-neutral-100 p-1 rounded-full">
                            <a href="#" 
                               wire:navigate.hover
                               class="px-4 py-1.5 rounded-full text-xs font-display font-bold transition-all duration-300 {{ !request('tipe') ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700' }}">
                               Semua
                            </a>
                            <a href="#" 
                               wire:navigate.hover
                               class="px-4 py-1.5 rounded-full text-xs font-display font-bold transition-all duration-300 {{ request('tipe') === 'bootcamp' ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700' }}">
                               Bootcamp
                            </a>
                            <a href="#" 
                               wire:navigate.hover
                               class="px-4 py-1.5 rounded-full text-xs font-display font-bold transition-all duration-300 {{ request('tipe') === 'course' ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700' }}">
                               E-Course
                            </a>
                        </div>
                    </div>

                    {{-- Tabs Kategori --}}
                    <div class="flex flex-wrap gap-2 md:gap-3">
                        <a href="#" 
                           wire:navigate.hover
                           class="px-5 py-2.5 rounded-full text-sm font-display font-bold transition-all duration-300 {{ !request('kategori') ? 'bg-primary-950 text-white shadow-md' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200' }}">
                           Semua Program
                        </a>
                        @foreach($categories as $cat)
                        <a href="#" 
                           wire:navigate.hover
                           class="px-5 py-2.5 rounded-full text-sm font-display font-bold transition-all duration-300 {{ request('kategori') === $cat ? 'bg-primary-950 text-white shadow-md' : 'bg-neutral-100 text-neutral-600 hover:bg-neutral-200' }}">
                           {{ ucwords(str_replace('-', ' ', $cat)) }}
                        </a>
                        @endforeach
                    </div>

                    {{-- Separator for Mobile --}}
                    <div class="h-px w-full bg-neutral-100 xl:hidden"></div>

                    
                </div>
                
            </x-ui.card>
        </div>

        {{-- Grid Programs --}}
        <section class="max-w-7xl mx-auto px-4 pt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programs as $program)
                    <x-partials.program-card :program="$program" />
                @empty
                    {{-- Empty State jika tidak ada program yang cocok --}}
                    <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-neutral-200 border-dashed">
                        <div class="w-16 h-16 bg-neutral-100 rounded-full flex items-center justify-center mx-auto mb-4 text-neutral-400">
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        </div>
                        <h3 class="text-xl font-display font-bold text-primary-950 mb-2">Program Tidak Ditemukan</h3>
                        <p class="text-neutral-500 font-body mb-6">Maaf, tidak ada program yang sesuai dengan filter pencarianmu saat ini.</p>
                        <x-ui.button variant="outline" wire:navigate href="{{ route('program.index') }}">
                            Reset Filter
                        </x-ui.button>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            @if($programs->hasPages())
                <div class="mt-16 flex justify-center">
                    {{ $programs->links() }}
                </div>
            @endif
        </section>
    </div>
</x-layout.app>