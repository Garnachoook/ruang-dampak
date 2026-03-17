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
            </div>
        </section>

        {{-- SMART SEARCH SECTION --}}
        <section class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 -mt-16 relative z-10">
            <div class="bg-white border border-slate-200 rounded-2xl p-6 md:p-8 shadow-xl shadow-slate-200/40 relative group">
                
                <div class="relative z-10">
                    <div class="flex items-center gap-2.5 mb-5">
                        <div class="p-2 bg-primary-600 rounded-lg text-white shadow-sm">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-display font-bold text-slate-900 text-lg leading-none">Temukan Program Dengan <span class="text-primary-600">Jarvis</span></h3>
                            <p class="text-xs text-slate-500 mt-1 font-medium italic">Cari berdasarkan minat, profesi, atau keahlian</p>
                        </div>
                    </div>

                    <form action="#" class="relative">
                        <input type="text" 
                            placeholder="Karena saya suka desain berikan saran course yang cocok..." 
                            class="w-full bg-slate-50 border-slate-200 rounded-xl py-4 pl-6 pr-16 text-slate-700 font-medium placeholder:text-slate-400 focus:ring-4 focus:ring-primary-100 focus:border-primary-600 transition-all outline-none">
                        
                        <button type="submit" class="absolute right-3 top-2.5 bottom-2.5 bg-primary-600 hover:bg-primary-700 text-white px-6 rounded-lg transition-colors shadow-sm flex items-center justify-center group/btn">
                            <svg class="w-5 h-5 transition-transform group-hover/btn:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </form>

                    {{-- Suggested Keywords --}}
                    <div class="mt-5 flex flex-wrap items-center gap-3">
                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest">Saran Populer:</span>
                        @foreach(['Project Fullstack', 'Design System', 'Data Analytics'] as $suggestion)
                        <button class="text-xs font-bold text-slate-600 bg-white border border-slate-200 px-4 py-1.5 rounded-full hover:border-primary-600 hover:text-primary-600 hover:bg-primary-50 transition-all">
                            {{ $suggestion }}
                        </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>



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
        </section>
    </div>
</x-layout.app>