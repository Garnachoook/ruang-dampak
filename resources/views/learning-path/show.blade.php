<x-layout.app>
    <x-slot:title>{{ $path->title }} - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-24">
        {{-- Hero --}}
        <section class="relative bg-primary-950 pt-32 pb-24 overflow-hidden border-b border-primary-900">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,rgba(59,130,246,0.15),transparent_100%)]"></div>
            
            <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
                <a href="{{ route('learning-path.index') }}" wire:navigate.hover class="inline-flex items-center gap-2 text-primary-300 hover:text-white font-body text-sm mb-8 transition-colors">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Semua Path
                </a>
                
                <h1 class="font-display font-black text-4xl md:text-5xl text-white mb-6 tracking-tight leading-tight">
                    {{ $path->title }}
                </h1>
                <p class="text-lg text-primary-200 font-body leading-relaxed mb-8">
                    {{ $path->description }}
                </p>
                
                <div class="flex justify-center items-center gap-4">
                    <div class="bg-primary-900/50 backdrop-blur border border-primary-800 rounded-full px-6 py-2.5 flex items-center gap-2">
                        <span class="text-primary-300 font-display font-bold">{{ $path->programs->count() }}</span>
                        <span class="text-primary-100 font-body text-sm">Program Terstruktur</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- Roadmap Timeline --}}
        <section class="max-w-4xl mx-auto px-4 pt-20">
            <div class="relative pl-10 md:pl-16 border-l-2 border-dashed border-neutral-300 ml-4 md:ml-8 space-y-16">
                
                @foreach($path->programs as $index => $program)
                    @php
                        $activeBatch = $program->batches->where('status', 'open')->first() ?? $program->batches->first();
                        $isOpen = $activeBatch && $activeBatch->status === 'open';
                    @endphp
                    
                    <div class="relative group">
                        {{-- Step Number Circle --}}
                        <span class="absolute -left-[3.2rem] md:-left-[5rem] flex items-center justify-center w-12 h-12 rounded-full bg-primary-950 text-white font-display font-black text-lg shadow-[0_0_0_8px_rgba(250,250,250,1)] ring-1 ring-neutral-200 transition-transform group-hover:scale-110 duration-300">
                            {{ sprintf('%02d', $index + 1) }}
                        </span>

                        <x-ui.card class="bg-white p-6 md:p-8 flex flex-col md:flex-row gap-6 items-start md:items-center">
                            <div class="flex-1">
                                <div class="flex items-center gap-2 mb-3">
                                    <x-ui.badge variant="subtle" type="{{ $program->type === 'bootcamp' ? 'info' : 'success' }}">{{ $program->type }}</x-ui.badge>
                                    @if($isOpen)
                                        <x-ui.badge variant="solid" type="primary" class="animate-pulse">Pendaftaran Buka</x-ui.badge>
                                    @endif
                                </div>
                                <h3 class="text-2xl font-display font-black text-primary-950 tracking-tight mb-2">{{ $program->title }}</h3>
                                <div class="flex items-center gap-4 text-sm font-body text-neutral-500 mb-4">
                                    <span class="flex items-center gap-1"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Estimasi 4-8 Minggu</span>
                                    @if($activeBatch)
                                        <span>•</span>
                                        <span class="font-semibold text-primary-600">{{ $activeBatch->name }}</span>
                                    @endif
                                </div>
                                <div class="font-display font-bold text-xl text-primary-950">
                                    Rp {{ number_format($program->price, 0, ',', '.') }}
                                </div>
                            </div>
                            
                            <div class="w-full md:w-auto mt-4 md:mt-0">
                                <x-ui.button variant="{{ $isOpen ? 'primary' : 'outline' }}" class="w-full md:w-auto" wire:navigate.hover href="{{ route('program.show', $program->slug) }}">
                                    {{ $isOpen ? 'Daftar Sekarang →' : 'Lihat Detail' }}
                                </x-ui.button>
                            </div>
                        </x-ui.card>
                    </div>
                @endforeach
                
                {{-- Finish Flag --}}
                <div class="relative">
                    <span class="absolute -left-[3.2rem] md:-left-[5rem] flex items-center justify-center w-12 h-12 rounded-full bg-emerald-500 text-white shadow-[0_0_0_8px_rgba(250,250,250,1)] ring-1 ring-neutral-200">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
                    </span>
                    <h3 class="text-xl font-display font-black text-neutral-400 mt-2">Siap Terjun ke Industri</h3>
                </div>

            </div>
        </section>
    </div>
</x-layout.app>