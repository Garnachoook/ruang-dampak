<x-layout.app>
    <x-slot:title>Portal Karir - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-24">
        {{-- Hero Section --}}
        <section class="relative bg-white pt-32 pb-20 overflow-hidden border-b border-neutral-200">
            <x-ui.background-pattern />
            
            <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
                <h1 class="font-display font-black text-4xl md:text-5xl lg:text-6xl text-primary-950 mb-6 tracking-tight">
                    Buka Peluang <br/><span class="text-primary-400">Karir Impianmu.</span>
                </h1>
                <p class="text-lg text-primary-900 font-body max-w-2xl mx-auto mb-8 leading-relaxed">
                    Eksplorasi {{ $jobs->total() }} posisi terbuka dari perusahaan teknologi terkemuka yang siap merekrut talenta Ruang Dampak.
                </p>
            </div>
        </section>

        {{-- Interactive Filter Bar --}}
        <section class="max-w-7xl mx-auto px-4 relative z-20 -mt-12">
            <x-ui.card class="p-4 md:p-6 shadow-xl shadow-primary-900/5 bg-white/95 backdrop-blur-xl border-neutral-200/80 rounded-3xl">
                <form method="GET" action="{{ route('career.index') }}" class="flex flex-col lg:flex-row gap-4">
                    
                    {{-- Search Input --}}
                    <div class="flex-1 relative">
                        <div class="absolute inset-y-0 left-4 flex items-center pointer-events-none text-neutral-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari posisi atau perusahaan..." 
                               class="w-full pl-11 pr-4 py-3.5 bg-neutral-100 border-transparent focus:bg-white focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 rounded-2xl font-body text-sm transition-all outline-none">
                    </div>

                    {{-- Mode & Type Filters --}}
                    <div class="flex gap-4 overflow-x-auto pb-2 lg:pb-0 hide-scrollbar">
                        <div class="flex bg-neutral-100 p-1.5 rounded-2xl shrink-0">
                            <a href="{{ request()->fullUrlWithQuery(['mode' => null]) }}" class="px-5 py-2 rounded-xl text-sm font-display font-bold transition-all {{ !request('mode') ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700' }}">Semua</a>
                            <a href="{{ request()->fullUrlWithQuery(['mode' => 'remote']) }}" class="px-5 py-2 rounded-xl text-sm font-display font-bold transition-all {{ request('mode') === 'remote' ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700' }}">Remote</a>
                        </div>
                        
                        <div class="flex bg-neutral-100 p-1.5 rounded-2xl shrink-0">
                            @foreach(['' => 'Semua', 'fulltime' => 'Full-time', 'part-time' => 'Part-time', 'internship' => 'Internship', 'freelance' => 'Freelance'] as $val => $label)
                                <a href="{{ request()->fullUrlWithQuery(['tipe' => $val ?: null]) }}" 
                                   class="px-5 py-2 rounded-xl text-sm font-display font-bold transition-all {{ request('tipe') == $val ? 'bg-white text-primary-950 shadow-sm' : 'text-neutral-500 hover:text-neutral-700' }}">
                                    {{ $label }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="hidden"></button> {{-- Hidden submit for Enter key in search --}}
                </form>
            </x-ui.card>
        </section>

        {{-- Job Listings Grid --}}
        <section class="max-w-7xl mx-auto px-4 pt-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse($jobs as $job)
                    @php
                        $isUrgent = \Carbon\Carbon::parse($job->deadline)->diffInDays(now()) <= 7;
                        $companyName = $job->mitra->mitraProfile->company_name ?? 'Confidential Company';
                        $logoUrl = $job->mitra->mitraProfile->company_logo_url ?? null;
                    @endphp

                    <x-ui.card class="p-6 md:p-8 bg-white border-neutral-200 hover:border-primary-300 hover:shadow-xl hover:shadow-primary-900/5 hover:-translate-y-1 transition-all duration-300 group flex flex-col h-full">
                        {{-- Header Card: Logo & Company --}}
                        <div class="flex items-start justify-between mb-5">
                            <div class="flex items-center gap-4">
                                <x-ui.avatar name="{{ $companyName }}" src="{{ $logoUrl }}" size="md" class="rounded-2xl border-neutral-100 shadow-sm" />
                                <div>
                                    <p class="text-sm font-display font-bold text-neutral-500">{{ $companyName }}</p>
                                    <div class="flex items-center gap-2 mt-1">
                                        @if($job->is_remote)
                                            <span class="text-[10px] font-bold uppercase tracking-widest text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-md"><i class="fa-solid fa-wifi mr-1"></i> Remote</span>
                                        @elseif($job->location)
                                            <span class="text-[10px] font-bold uppercase tracking-widest text-neutral-500"><i class="fa-solid fa-location-dot mr-1"></i> {{ $job->location }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <x-ui.badge variant="subtle" type="info" class="capitalize">{{ str_replace('-', ' ', $job->type) }}</x-ui.badge>
                        </div>

                        {{-- Job Title --}}
                        <h2 class="text-xl font-display font-black text-primary-950 mb-6 group-hover:text-primary-600 transition-colors leading-tight">
                            <a href="{{ route('career.show', $job->id) }}" wire:navigate.hover class="focus:outline-none">
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                {{ $job->title }}
                            </a>
                        </h2>

                        {{-- Footer Card: Deadline & CTA --}}
                        <div class="mt-auto pt-5 border-t border-neutral-100 flex items-center justify-between">
                            <div class="flex items-center gap-2 text-xs font-body font-medium {{ $isUrgent ? 'text-rose-600' : 'text-neutral-500' }}">
                                <i class="fa-regular fa-clock"></i>
                                Ditutup {{ \Carbon\Carbon::parse($job->deadline)->format('d M Y') }}
                            </div>
                            <span class="text-primary-600 font-display font-bold text-sm flex items-center gap-1 group-hover:translate-x-1 transition-transform">
                                Detail <i class="fa-solid fa-arrow-right text-xs"></i>
                            </span>
                        </div>
                    </x-ui.card>
                @empty
                    <div class="col-span-full py-20 text-center bg-white rounded-3xl border border-neutral-200 border-dashed">
                        <div class="w-16 h-16 bg-neutral-50 rounded-full flex items-center justify-center mx-auto mb-4 text-neutral-400">
                            <i class="fa-solid fa-folder-open text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-display font-bold text-primary-950 mb-2">Belum ada lowongan</h3>
                        <p class="text-neutral-500 font-body">Coba ubah filter pencarianmu atau kembali lagi nanti.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $jobs->links() }}
            </div>
        </section>
    </div>
</x-layout.app>