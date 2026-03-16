<x-layout.app>
    <x-slot:title>{{ $job->title }} - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-24 pt-24 md:pt-32">
        <div class="max-w-7xl mx-auto px-4">
            
            {{-- Breadcrumb --}}
            <nav class="flex items-center gap-2 text-sm font-body text-neutral-500 mb-8">
                <a href="{{ route('career.index') }}" wire:navigate.hover class="hover:text-primary-600 transition-colors">Portal Karir</a>
                <i class="fa-solid fa-chevron-right text-[10px]"></i>
                <span class="text-primary-950 font-semibold truncate">{{ $job->title }}</span>
            </nav>

            <div class="flex flex-col lg:flex-row gap-8 lg:gap-12">
                
                {{-- Kiri: Detail Lowongan (65%) --}}
                <div class="lg:w-[65%]">
                    <div class="bg-white rounded-3xl p-8 md:p-12 border border-neutral-200 shadow-sm mb-8">
                        {{-- Header Lowongan --}}
                        <div class="mb-8 pb-8 border-b border-neutral-100">
                            <h1 class="text-3xl md:text-4xl font-display font-black text-primary-950 mb-4 tracking-tight leading-tight">{{ $job->title }}</h1>
                            
                            <div class="flex flex-wrap items-center gap-3">
                                <x-ui.badge variant="subtle" type="info" class="capitalize">
                                    <i class="fa-solid fa-briefcase mr-1.5"></i> {{ str_replace('-', ' ', $job->type) }}
                                </x-ui.badge>
                                
                                @if($job->is_remote)
                                    <x-ui.badge variant="subtle" type="success">
                                        <i class="fa-solid fa-wifi mr-1.5"></i> Remote
                                    </x-ui.badge>
                                @elseif($job->location)
                                    <x-ui.badge variant="subtle" type="neutral">
                                        <i class="fa-solid fa-location-dot mr-1.5"></i> {{ $job->location }}
                                    </x-ui.badge>
                                @endif
                            </div>
                        </div>

                        {{-- Deskripsi (Prose) --}}
                        <div class="prose prose-primary max-w-none text-neutral-600 font-body prose-headings:font-display prose-headings:font-bold prose-a:text-primary-600 prose-li:marker:text-primary-600">
                            {!! nl2br(e($job->description)) !!}
                        </div>

                        {{-- CTA --}}
                        <div class="mt-12 pt-8 border-t border-neutral-100">
                            @php
                                $applyLink = $job->apply_url ?? 'mailto:' . ($job->mitra->email ?? 'karir@ruangdampak.com');
                            @endphp
                            <a href="{{ $applyLink }}" target="_blank" class="inline-flex items-center justify-center w-full md:w-auto bg-primary-950 hover:bg-primary-800 text-white font-display font-bold px-10 py-4 rounded-full transition-all hover:-translate-y-1 shadow-lg shadow-primary-950/20 text-lg">
                                Lamar Sekarang <i class="fa-solid fa-paper-plane ml-2"></i>
                            </a>
                            <p class="text-xs font-body text-neutral-400 mt-4 text-center md:text-left">
                                <i class="fa-regular fa-clock"></i> Lamaran ditutup pada {{ \Carbon\Carbon::parse($job->deadline)->format('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Kanan: Sidebar Sticky (35%) --}}
                <div class="lg:w-[35%]">
                    <div class="sticky top-28 space-y-6">
                        
                        {{-- Card Perusahaan --}}
                        @php
                            $mitra = $job->mitra->mitraProfile;
                        @endphp
                        <x-ui.card class="p-8 bg-white border-neutral-200 shadow-sm text-center">
                            <x-ui.avatar name="{{ $mitra->company_name ?? 'Confidential' }}" src="{{ $mitra->company_logo_url ?? null }}" size="lg" class="rounded-3xl border-2 border-neutral-100 shadow-md mx-auto mb-6 w-20 h-20 text-2xl" />
                            <h3 class="text-xl font-display font-black text-primary-950 mb-1">{{ $mitra->company_name ?? 'Perusahaan Rahasia' }}</h3>
                            @if($mitra && $mitra->industry)
                                <p class="text-sm font-body text-neutral-500 mb-6">{{ $mitra->industry }}</p>
                            @endif
                            
                            @if($mitra && $mitra->website_url)
                                <a href="{{ $mitra->website_url }}" target="_blank" class="inline-flex items-center gap-2 text-sm font-display font-bold text-primary-600 hover:text-primary-800 transition-colors bg-primary-50 px-4 py-2 rounded-full">
                                    <i class="fa-solid fa-link"></i> Kunjungi Website
                                </a>
                            @endif
                        </x-ui.card>

                        {{-- Lowongan Lain --}}
                        @if($related->count() > 0)
                            <x-ui.card class="p-6 bg-white border-neutral-200 shadow-sm">
                                <h4 class="text-sm font-display font-bold text-neutral-400 uppercase tracking-widest mb-4">Lowongan Lain dari {{ $mitra->company_name ?? 'Perusahaan Ini' }}</h4>
                                <ul class="space-y-4">
                                    @foreach($related as $relJob)
                                        <li>
                                            <a href="{{ route('career.show', $relJob->id) }}" wire:navigate.hover class="group block p-3 -mx-3 rounded-xl hover:bg-neutral-50 transition-colors">
                                                <h5 class="font-display font-bold text-primary-950 group-hover:text-primary-600 transition-colors mb-1">{{ $relJob->title }}</h5>
                                                <div class="flex items-center justify-between">
                                                    <span class="text-xs font-body text-neutral-500 capitalize">{{ str_replace('-', ' ', $relJob->type) }}</span>
                                                    <span class="text-xs font-display font-bold text-primary-600 opacity-0 group-hover:opacity-100 transition-opacity">Lihat <i class="fa-solid fa-arrow-right"></i></span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </x-ui.card>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout.app>