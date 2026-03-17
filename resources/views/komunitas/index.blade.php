<x-app-layout>
    {{-- HERO SECTION --}}

        <section class="relative bg-white pt-32 pb-20 overflow-hidden border-b border-neutral-200">
            <x-ui.background-pattern />
            <div class="max-w-7xl mx-auto px-4 text-center relative z-10">
                <h1 class="font-display font-black text-4xl md:text-5xl lg:text-6xl text-primary-950 mb-6 tracking-tight leading-tight">
                    Tumbuh Bersama di <br class="hidden sm:block" />
                    <span class="text-primary-600">Komunitas</span>
                </h1>
                <p class="text-lg text-neutral-500 font-body mb-6 max-w-2xl mx-auto leading-relaxed">
                    Tempat bertukar pikiran, memecahkan masalah kode, dan membangun relasi dengan sesama talenta digital di seluruh Indonesia.
                </p>
            </div>
        </section>  

    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12 space-y-10">
        
        {{-- DISCORD BANNER CTA --}}
        <div class="bg-[#5865F2] rounded-2xl p-6 md:p-8 flex flex-col md:flex-row items-center justify-between text-white shadow-lg overflow-hidden relative">
            <div class="absolute -right-10 -top-10 opacity-10">
                <svg class="w-64 h-64" fill="currentColor" viewBox="0 0 127.14 96.36"><path d="M107.7,8.07A105.15,105.15,0,0,0,81.47,0a72.06,72.06,0,0,0-3.36,6.83A97.68,97.68,0,0,0,49,6.83,72.37,72.37,0,0,0,45.64,0,105.89,105.89,0,0,0,19.39,8.09C2.79,32.65-1.71,56.6.54,80.21h0A105.73,105.73,0,0,0,32.71,96.36,77.7,77.7,0,0,0,39.6,85.25a68.42,68.42,0,0,1-10.85-5.18c.91-.66,1.8-1.34,2.66-2a75.57,75.57,0,0,0,64.32,0c.87.71,1.76,1.39,2.66,2a68.68,68.68,0,0,1-10.87,5.19,77,77,0,0,0,6.89,11.1,105.25,105.25,0,0,0,32.19-16.14c2.64-27.38-4.51-51.11-19.32-72.15ZM42.45,65.69C36.18,65.69,31,60,31,53s5-12.74,11.43-12.74S54,46,53.89,53,48.84,65.69,42.45,65.69Zm42.24,0C78.41,65.69,73.31,60,73.31,53s5-12.74,11.43-12.74S96.1,46,96,53,91,65.69,84.69,65.69Z"/></svg>
            </div>
            <div class="relative z-10 mb-6 md:mb-0 text-center md:text-left">
                <h2 class="text-2xl font-bold mb-2">Join Server Discord Kami!</h2>
                <p class="text-blue-100 max-w-lg">Ngobrol lebih santai, ikut voice channel, dan dapatkan update realtime seputar program.</p>
            </div>
            <a href="#" class="relative z-10 bg-white text-[#5865F2] px-6 py-3 rounded-xl font-bold hover:bg-slate-50 transition shadow-sm">
                Gabung Sekarang
            </a>
        </div>

        {{-- KATEGORI DISKUSI --}}
        <section>
            <div class="flex justify-between items-end mb-4">
                <h3 class="text-xl font-bold text-slate-900">Kategori Diskusi</h3>
            </div>
            
            <div class="flex gap-4 overflow-x-auto pb-4 snap-x hide-scrollbar">
                @foreach($categories as $cat)
                <a href="#" class="min-w-[150px] h-16 bg-white border border-slate-200 rounded-xl px-5 flex items-center relative overflow-hidden group snap-start shrink-0 shadow-sm hover:shadow-md hover:border-slate-300 transition-all duration-300">
                    
                    {{-- Aksen Garis Warna di Atas Card (dibuat lebih tipis agar proporsional) --}}
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r {{ $cat['color'] }} opacity-80 group-hover:opacity-100 transition-opacity"></div>
                    
                    {{-- Efek Lingkaran Pendar (Glow) Disesuaikan ukurannya --}}
                    <div class="absolute -right-2 -top-2 w-12 h-12 rounded-full bg-gradient-to-br {{ $cat['color'] }} opacity-10 group-hover:scale-150 group-hover:opacity-20 transition-all duration-500 ease-out"></div>

                    {{-- Teks Kategori (Ditengahkan) --}}
                    <span class="relative z-10 text-slate-700 font-semibold text-sm md:text-base group-hover:text-slate-900 transition-colors w-full text-center">
                        {{ $cat['name'] }}
                    </span>
                </a>
                @endforeach
            </div>
        </section>

        {{-- DISKUSI TERBARU --}}
        <section class="bg-white border border-slate-200 rounded-2xl shadow-sm overflow-hidden">
            <div class="p-4 md:p-6 border-b border-slate-200 flex justify-between items-center bg-slate-50/50">
                <h3 class="text-lg font-bold text-slate-900">Diskusi Terbaru</h3>
            </div>

            <div class="divide-y divide-slate-200">
                {{-- Memanggil komponen secara dinamis --}}
                @foreach($discussions as $post)
                    <x-partials.discussion-card :post="$post" />
                @endforeach
            </div>

            <div class="p-4 border-t border-slate-200 text-center bg-slate-50/50">
                <button class="text-sm font-bold text-slate-700 hover:text-blue-600 transition">
                    Muat Lebih Banyak
                </button>
            </div>
        </section>
        
        @guest
            <section class="bg-gradient-to-br from-blue-50 to-slate-50 border border-blue-100 rounded-2xl p-8 md:p-12 text-center relative overflow-hidden shadow-sm mt-10">
                
                {{-- Dekorasi Pendar Halus (Glow) di Background --}}
                <div class="absolute -right-10 -top-10 w-40 h-40 bg-primary-900 rounded-full mix-blend-multiply filter blur-3xl opacity-50"></div>
                <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-primary-900 rounded-full mix-blend-multiply filter blur-3xl"></div>

                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white rounded-2xl shadow-sm border border-slate-200 flex items-center justify-center mx-auto mb-6 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z"></path></svg>
                    </div>
                    
                    <h2 class="text-2xl md:text-3xl font-bold text-slate-900 mb-4">Ingin Ikut Berdiskusi?</h2>
                    <p class="text-slate-600 max-w-2xl mx-auto mb-8 text-base md:text-lg">
                        Bergabunglah dengan komunitas Ruang Dampak. Buat topik baru, bantu jawab pertanyaan, dan bangun reputasi profesionalmu di depan perusahaan mitra.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                        {{-- Pastikan route('register') dan route('login') sesuai dengan route auth kamu --}}
                        <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl font-bold transition-colors shadow-sm focus:ring-4 focus:ring-blue-100">
                            Daftar Sekarang Gratis
                        </a>
                        <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3.5 bg-white hover:bg-slate-50 text-slate-700 border border-slate-200 rounded-xl font-bold transition-colors shadow-sm focus:ring-4 focus:ring-slate-100">
                            Sudah Punya Akun? Masuk
                        </a>
                    </div>
                </div>
            </section>
        @endguest
    </main>

    
</x-app-layout>