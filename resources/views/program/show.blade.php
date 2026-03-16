<x-layout.app>

<div class="max-w-7xl mx-auto px-4 py-12" x-data="{ tab: 'kurikulum' }">
    {{-- Breadcrumb --}}
    <nav class="flex text-gray-400 text-xs font-body mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-2">
            <li><a href="{{ route('program.index') }}" class="hover:text-primary-900">Program</a></li>
            <li><span>/</span></li>
            <li class="text-gray-900 font-semibold">{{ $program->title }}</li>
        </ol>
    </nav>

    <div class="flex flex-col lg:flex-row gap-8">
        {{-- Kolom Kiri --}}
        <div class="lg:w-3/5">
            <div class="relative aspect-video rounded-xl overflow-hidden mb-8">
                <img src="{{ $program->thumbnail_url }}" class="w-full h-full object-cover">
            </div>

            <div class="mb-8">
                <div class="flex gap-2 mb-4">
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-[10px] font-bold uppercase">{{ $program->type }}</span>
                    <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-full text-[10px] font-bold uppercase">{{ $program->category }}</span>
                </div>
                <h1 class="font-display font-semibold text-3xl text-gray-900 mb-4">{{ $program->title }}</h1>
                <div class="prose prose-sm max-w-none text-gray-600 font-body">
                    {!! $program->description !!}
                </div>
            </div>

            {{-- Tabs --}}
            <div class="border-b border-gray-200 mb-6 flex gap-8">
                @foreach(['Kurikulum', 'Live Session', 'Mentor', 'FAQ'] as $t)
                    <button @click="tab = '{{ strtolower(str_replace(' ', '-', $t)) }}'"
                            :class="tab === '{{ strtolower(str_replace(' ', '-', $t)) }}' ? 'border-primary-900 text-primary-900' : 'border-transparent text-gray-500'"
                            class="pb-4 border-b-2 font-display font-semibold text-sm transition">
                        {{ $t }}
                    </button>
                @endforeach
            </div>

            {{-- Tab Content: Kurikulum --}}
            <div x-show="tab === 'kurikulum'" class="space-y-4">
                @foreach($program->modules->groupBy('week_number') as $week => $modules)
                    <div x-data="{ open: true }" class="border border-gray-100 rounded-xl overflow-hidden">
                        <button @click="open = !open" class="w-full flex items-center justify-between p-4 bg-gray-50 text-left">
                            <span class="font-display font-semibold text-gray-900">Minggu {{ $week }}</span>
                            <svg :class="open ? 'rotate-180' : ''" class="w-4 h-4 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="open" class="p-4 space-y-3">
                            @foreach($modules as $module)
                                <div class="flex items-center gap-3 text-sm text-gray-600">
                                    @if($module->video_url)
                                        <svg class="w-4 h-4 text-primary-900" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168l4.74 3.16a1 1 0 010 1.664l-4.74 3.16A1 1 0 018 14.24V7.832a1 1 0 011.555-.664z"/></svg>
                                    @else
                                        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                    @endif
                                    {{ $module->title }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{-- Tab Content lainnya menyusul dengan logika serupa --}}
        </div>

        {{-- Kolom Kanan (Sticky Sidebar) --}}
        <div class="lg:w-2/5">
            <div class="sticky top-8 space-y-6">
                <div class="bg-white rounded-xl shadow-xl border border-gray-100 p-6">
                    <div class="flex items-baseline gap-2 mb-6">
                        <span class="text-3xl font-display font-bold text-primary-900">Rp {{ number_format($program->price, 0, ',', '.') }}</span>
                        @if($program->hasDiscount())
                            <span class="text-sm text-gray-400 line-through">Rp {{ number_format($program->original_price, 0, ',', '.') }}</span>
                        @endif
                    </div>

                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-xs font-body">
                            <span class="text-gray-500">Slot Tersisa</span>
                            <span class="text-primary-900 font-bold">{{ $activeBatch->max_slots - $activeBatch->enrollments->count() }} Slot</span>
                        </div>
                        @php
                            $enrolledCount = $activeBatch->enrollments->count() ?? 0;
                            $maxSlots = $activeBatch->max_slots ?? 0;
                            $percentage = $maxSlots > 0 ? ($enrolledCount / $maxSlots) * 100 : 0;
                        @endphp

                        <x-ui.progres-bar 
                            label="{{ $enrolledCount }} / {{ $maxSlots > 0 ? $maxSlots : '~' }} slot terisi" 
                            :value="$percentage" 
                            color="primary" 
                        />
                    </div>

                    <button class="w-full bg-primary-900 text-white font-display font-semibold py-4 rounded-xl hover:bg-primary-800 transition mb-6">
                        Daftar Sekarang
                    </button>

                    <div class="space-y-3">
                        @foreach(['Rekaman seumur hidup', 'Sertifikat Kelulusan', 'Live Session 2× Seminggu'] as $info)
                            <div class="flex items-center gap-3 text-xs text-gray-600 font-body">
                                <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293l-4.242 4.242a1 1 0 01-1.414 0L5.293 10.24a1 1 0 011.414-1.414l2.122 2.121 3.535-3.535a1 1 0 011.414 1.414z"/></svg>
                                {{ $info }}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-layout.app>