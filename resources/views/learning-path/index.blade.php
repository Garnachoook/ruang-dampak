<x-layout.app>
    <x-slot:title>Learning Path - Ruang Dampak</x-slot:title>

    @php
        // Dummy Data dengan tambahan property 'category'
        $paths = [
            (object)[
                'title' => 'Full-Stack Web Developer',
                'slug' => 'full-stack-web-developer',
                'category' => 'Programming',
                'description' => 'Kuasai pembuatan website dari hulu ke hilir menggunakan Laravel dan React.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'programs' => collect([
                    (object)['title' => 'Web Dev Fundamentals', 'type' => 'Course'],
                    (object)['title' => 'Frontend with React', 'type' => 'Bootcamp'],
                    (object)['title' => 'Backend with Laravel', 'type' => 'Bootcamp'],
                    (object)['title' => 'Capstone Project', 'type' => 'Bootcamp']
                ])
            ],
            (object)[
                'title' => 'UI/UX Designer',
                'slug' => 'ui-ux-designer',
                'category' => 'Design',
                'description' => 'Rancang antarmuka digital yang estetis dan memecahkan masalah pengguna.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1561070791-2526d30994b5?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'programs' => collect([
                    (object)['title' => 'UX Research', 'type' => 'Course'],
                    (object)['title' => 'Figma Mastery', 'type' => 'Bootcamp'],
                    (object)['title' => 'Usability Testing', 'type' => 'Course']
                ])
            ],
            (object)[
                'title' => 'Data Scientist',
                'slug' => 'data-scientist',
                'category' => 'Data',
                'description' => 'Ubah data mentah menjadi wawasan bisnis dengan Python dan Machine Learning.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'programs' => collect([
                    (object)['title' => 'Python for Data', 'type' => 'Course'],
                    (object)['title' => 'SQL & Database', 'type' => 'Course'],
                    (object)['title' => 'Machine Learning', 'type' => 'Bootcamp'],
                    (object)['title' => 'Data Storytelling', 'type' => 'Course']
                ])
            ],
            (object)[
                'title' => 'Mobile App Developer',
                'slug' => 'mobile-app-developer',
                'category' => 'Programming',
                'description' => 'Bangun aplikasi Android dan iOS dari satu basis kode menggunakan Flutter.',
                'thumbnail_url' => 'https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
                'programs' => collect([
                    (object)['title' => 'Dart Programming', 'type' => 'Course'],
                    (object)['title' => 'Flutter UI Components', 'type' => 'Bootcamp'],
                    (object)['title' => 'State Management', 'type' => 'Bootcamp']
                ])
            ],
            (object)[
                'title' => 'Product Manager',
                'slug' => 'product-manager',
                'category' => 'Manajemen',
                'description' => 'Jadilah nakhoda di balik produk digital yang sukses dengan metodologi Agile.',
                'thumbnail_url' => null,
                'programs' => collect([
                    (object)['title' => 'Agile & Scrum', 'type' => 'Course'],
                    (object)['title' => 'Product Strategy', 'type' => 'Bootcamp'],
                    (object)['title' => 'Go-To-Market', 'type' => 'Bootcamp']
                ])
            ]
        ];

        // Ekstrak kategori unik dari dummy data
        $categories = collect($paths)->pluck('category')->unique()->values();
    @endphp

    {{-- Gunakan Alpine.js untuk state tab aktif --}}
    <div x-data="{ activeTab: 'Semua' }" class="bg-neutral-50 min-h-screen pb-24">
        
        {{-- Hero Section --}}
        <section class="relative bg-white pt-32 pb-20 overflow-hidden border-b border-neutral-200">
            <x-ui.background-pattern />
            <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
                <h1 class="font-display font-black text-4xl md:text-5xl lg:text-6xl text-primary-950 mb-6 tracking-tight">
                    Mulai dari Mana Saja, <br/>
                    <span class="text-primary-600">Capai Tujuanmu.</span>
                </h1>
                <p class="text-lg text-neutral-500 font-body max-w-2xl mx-auto leading-relaxed">
                    Panduan belajar terstruktur selangkah demi selangkah dari nol hingga siap direkrut oleh perusahaan impian.
                </p>
            </div>
        </section>

        {{-- Section Filter & Grid --}}
        <section class="max-w-7xl mx-auto px-4 relative z-20 -mt-8">
            
            {{-- Tab Filter Floating --}}
            <div class="flex flex-wrap justify-center gap-2 mb-12 bg-white/90 backdrop-blur-md p-2 rounded-full shadow-sm border border-neutral-200 w-fit mx-auto">
                <button @click="activeTab = 'Semua'" 
                        class="px-5 py-2 rounded-full text-sm font-display font-bold transition-all duration-300 focus:outline-none"
                        :class="activeTab === 'Semua' ? 'bg-primary-950 text-white shadow-md' : 'text-neutral-500 hover:text-primary-950 hover:bg-neutral-100'">
                    Semua Path
                </button>
                @foreach($categories as $cat)
                    <button @click="activeTab = '{{ $cat }}'" 
                            class="px-5 py-2 rounded-full text-sm font-display font-bold transition-all duration-300 focus:outline-none"
                            :class="activeTab === '{{ $cat }}' ? 'bg-primary-950 text-white shadow-md' : 'text-neutral-500 hover:text-primary-950 hover:bg-neutral-100'">
                        {{ $cat }}
                    </button>
                @endforeach
            </div>

            {{-- Grid Path (Menjadi 3 Kolom) --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($paths as $path)
                
                {{-- Logika filter Alpine.js --}}
                <div x-show="activeTab === 'Semua' || activeTab === '{{ $path->category }}'" 
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 transform scale-95"
                     x-transition:enter-end="opacity-100 transform scale-100"
                     style="display: none;">
                     
                    <x-ui.card class="flex flex-col h-full group bg-white border-neutral-200 hover:shadow-xl hover:-translate-y-1 transition-all duration-500">
                        
                        {{-- Thumbnail yang lebih compact --}}
                        <div class="aspect-video relative overflow-hidden bg-neutral-100 border-b border-neutral-100">
                            @if($path->thumbnail_url)
                                <img src="{{ $path->thumbnail_url }}" alt="{{ $path->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                            @else
                                <div class="absolute inset-0 bg-[linear-gradient(to_right,#e5e7eb_1px,transparent_1px),linear-gradient(to_bottom,#e5e7eb_1px,transparent_1px)] bg-[size:16px_16px]"></div>
                                <div class="w-full h-full bg-gradient-to-br from-primary-50/80 to-neutral-100/80 flex items-center justify-center relative z-10">
                                    <span class="text-primary-200 font-display font-black text-4xl tracking-tighter">RD<span class="text-primary-600">.</span></span>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-primary-950/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10"></div>
                            
                            {{-- Badge Kategori Melayang --}}
                            <div class="absolute top-3 left-3 z-20">
                                <span class="bg-white/95 backdrop-blur-sm text-primary-950 text-[10px] font-bold px-3 py-1 rounded-full shadow-sm uppercase tracking-wider">
                                    {{ $path->category }}
                                </span>
                            </div>
                        </div>
                        
                        {{-- Konten Card yang lebih padat --}}
                        <div class="p-6 flex flex-col flex-grow">
                            <h2 class="text-xl font-display font-black text-primary-950 mb-2 tracking-tight group-hover:text-primary-600 transition-colors">
                                {{ $path->title }}
                            </h2>
                            <p class="text-neutral-500 font-body text-sm leading-relaxed mb-6 line-clamp-2">
                                {{ $path->description }}
                            </p>
                            
                            {{-- Mini Timeline (Dibatasi 2 agar muat di 3 kolom) --}}
                            <div class="mt-auto mb-6">
                                <div class="relative pl-3 border-l-2 border-dashed border-neutral-200 space-y-4 ml-1">
                                    @foreach($path->programs->take(2) as $program)
                                        <div class="relative pl-4">
                                            <div class="absolute -left-[23px] top-1 w-2.5 h-2.5 rounded-full bg-primary-100 border-2 border-primary-600 ring-4 ring-white group-hover:bg-primary-600 transition-colors duration-300"></div>
                                            <p class="text-sm font-display font-bold text-primary-950 leading-tight truncate">{{ $program->title }}</p>
                                        </div>
                                    @endforeach
                                    
                                    @if($path->programs->count() > 2)
                                        <div class="relative pl-4">
                                            <div class="absolute -left-[23px] top-1 w-2.5 h-2.5 rounded-full bg-neutral-200 border-2 border-neutral-300 ring-4 ring-white"></div>
                                            <p class="text-xs font-display font-bold text-neutral-500">+ {{ $path->programs->count() - 2 }} program lainnya</p>
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <x-ui.button variant="outline" size="sm" class="w-full justify-between group-hover:bg-primary-950 group-hover:text-white group-hover:border-primary-950 transition-all duration-300 border-neutral-200 text-primary-950" wire:navigate.hover href="{{ route('learning-path.show', $path->slug) }}">
                                <span>Lihat Roadmap</span>
                                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </x-ui.button>
                        </div>
                    </x-ui.card>
                </div>
                @endforeach
            </div>
            
            {{-- Empty State (Jika filter kosong) --}}
            <div x-show="!['Semua', @foreach($categories as $cat) '{{ $cat }}', @endforeach].includes(activeTab)" class="py-20 text-center" style="display: none;">
                <p class="text-neutral-500 font-body">Tidak ada learning path di kategori ini.</p>
            </div>

        </section>
    </div>
</x-layout.app>