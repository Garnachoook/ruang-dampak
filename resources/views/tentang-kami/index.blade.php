<x-layout.app>
    <x-slot:title>Tentang Kami - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-20">
        {{-- 1. Hero Section --}}
        <section class="relative bg-neut pt-32 pb-28 overflow-hidden border-b border-neutral-200">
            <x-ui.background-pattern />
            
            <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
                
                <h1 class="font-display font-black text-4xl md:text-6xl text-primary-950 mb-6 tracking-tight leading-[1.1]">
                    Menjembatani Kampus <br class="hidden md:block" />
                    <span class="text-primary-600">dan Dunia Industri.</span>
                </h1>
                
                <p class="text-lg md:text-xl text-neutral-500 font-body max-w-2xl mx-auto leading-relaxed">
                    Kami hadir bukan sekadar sebagai platform belajar, melainkan ekosistem kurasi bakat yang memastikan setiap talenta siap bekerja dan berdampak.
                </p>
            </div>
        </section>

{{-- 2. Our Story / Narrative --}}
        <section class="max-w-7xl mx-auto px-4 py-20 md:py-32">
            <div class="flex flex-col lg:flex-row gap-12 lg:gap-20 items-center">
                
                {{-- Image Column --}}
                <div class="lg:w-1/2 relative group">
                    <div class="aspect-square md:aspect-[4/3] rounded-3xl overflow-hidden bg-neutral-100 relative shadow-xl shadow-primary-900/5 ring-1 ring-neutral-200/50 z-10">
                        <img src="{{ asset('images/tentang-kami.png') }}" alt="Cerita Ruang Dampak" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        
                        {{-- Overlay gradient halus saat hover --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-primary-900/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                </div>
                
                {{-- Text Column --}}
                <div class="lg:w-1/2 space-y-8">
                    <div>
                        <h2 class="text-3xl md:text-4xl font-display font-bold text-primary-900 tracking-tight leading-tight">Berawal dari Keresahan</h2>
                    </div>
                    
                    <div class="space-y-5 text-neutral-600 font-body text-lg leading-relaxed">
                        <p>
                            Ruang Dampak lahir dari satu masalah besar di Indonesia: adanya gap (kesenjangan) yang jauh antara kurikulum akademis di perguruan tinggi dengan ekspektasi keterampilan di dunia industri nyata.
                        </p>
                        <p>
                            Kami melihat banyak mahasiswa tingkat akhir yang memiliki potensi besar, namun gagal menembus tahap seleksi perusahaan karena minimnya pengalaman praktis dan portofolio.
                        </p>

                         <p class="text-primary-900 font-display font-semibold text-lg leading-snug">
                                Karena itu, kami membangun sistem talent pipeline tertutup. Di sini, talenta tidak hanya belajar, tapi ditempa, divalidasi, dan disalurkan.
                            </p>
                    </div>
                </div>
                
            </div>
        </section>

        {{-- 3. Stats Section --}}
        <section class="bg-primary-900 py-24 relative overflow-hidden my-12 md:rounded-3xl mx-0 md:mx-4 xl:mx-auto max-w-[86rem] shadow-2xl shadow-primary-900/20">
            
            <div class="max-w-5xl mx-auto px-4 relative z-10">
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-y-12 gap-x-8 text-center divide-x-0 lg:divide-x divide-primary-800/60">
                    <div class="px-4 hover:-translate-y-1 transition-transform duration-300">
                        <p class="text-5xl md:text-6xl font-display font-bold text-white mb-3 tracking-tight">1.2K<span class="text-accent-teal">+</span></p>
                        <p class="text-primary-200 font-body text-sm uppercase tracking-widest font-bold">Peserta Terdaftar</p>
                    </div>
                    <div class="px-4 hover:-translate-y-1 transition-transform duration-300">
                        <p class="text-5xl md:text-6xl font-display font-bold text-white mb-3 tracking-tight">20<span class="text-accent-teal">+</span></p>
                        <p class="text-primary-200 font-body text-sm uppercase tracking-widest font-bold">Mentor Expert</p>
                    </div>
                    <div class="px-4 hover:-translate-y-1 transition-transform duration-300">
                        <p class="text-5xl md:text-6xl font-display font-bold text-white mb-3 tracking-tight">15<span class="text-accent-teal">+</span></p>
                        <p class="text-primary-200 font-body text-sm uppercase tracking-widest font-bold">Program Aktif</p>
                    </div>
                    <div class="px-4 hover:-translate-y-1 transition-transform duration-300">
                        <p class="text-5xl md:text-6xl font-display font-bold text-white mb-3 tracking-tight">87<span class="text-accent-teal">%</span></p>
                        <p class="text-primary-200 font-body text-sm uppercase tracking-widest font-bold">Tingkat Penempatan</p>
                    </div>
                </div>
            </div>
        </section>

        {{-- 5. Nilai-Nilai (Core Values) --}}
        <section class="max-w-7xl mx-auto px-4 py-24">
            <div class="text-center mb-16">
                <x-ui.badge type="primary" class="mb-4">DNA Platform</x-ui.badge>
                <h2 class="text-3xl md:text-4xl font-display font-black text-primary-950 tracking-tight">Nilai Inti Kami</h2>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                    $values = [
                        ['Kolaborasi', 'Belajar dan tumbuh bersama melalui interaksi yang membangun, bukan bersaing sendirian.', 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z'],
                        ['Dampak', 'Berorientasi pada hasil nyata yang memecahkan masalah dan membawa perubahan positif.', 'M13 10V3L4 14h7v7l9-11h-7z'],
                        ['Kualitas', 'Standar materi industri dan kurasi bakat yang ketat, tidak pernah dikompromikan.', 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z'],
                        ['Inklusif', 'Peluang akselerasi karir dan belajar yang terbuka untuk semua kalangan di seluruh Indonesia.', 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9']
                    ];
                @endphp
                @foreach($values as $val)
                    <x-ui.card class="p-8 bg-white border-neutral-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300">
                        <div class="w-12 h-12 bg-primary-50 rounded-2xl flex items-center justify-center text-primary-600 mb-6">
                            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $val[2] }}"/></svg>
                        </div>
                        <h3 class="text-xl font-display font-bold text-primary-950 mb-3 tracking-tight">{{ $val[0] }}</h3>
                        <p class="text-neutral-500 font-body text-sm leading-relaxed">{{ $val[1] }}</p>
                    </x-ui.card>
                @endforeach
            </div>
        </section>

        {{-- 6. Final CTA --}}
        <section class="max-w-7xl mx-auto px-4 pb-24">
            <div class="bg-primary-50 rounded-3xl p-10 md:p-16 text-center border border-primary-100">
                <h2 class="text-3xl font-display font-black text-primary-950 mb-4 tracking-tight">Siap Menciptakan Dampak?</h2>
                <p class="text-neutral-600 font-body mb-8 max-w-xl mx-auto">Bergabunglah bersama ribuan talenta lainnya dan mulai perjalanan akselerasi karirmu hari ini.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <x-ui.button variant="primary" size="lg" wire:navigate href="{{ route('register') }}">
                        Daftar Sekarang
                    </x-ui.button>
                    <x-ui.button variant="outline" size="lg" wire:navigate href="{{ route('program.index') }}">
                        Eksplorasi Program
                    </x-ui.button>
                </div>
            </div>
        </section>
    </div>
</x-layout.app>