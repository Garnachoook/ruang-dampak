<x-layout.app>
    <x-slot:title>Dashboard Mitra - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen pb-24 pt-24 md:pt-32 flex flex-col justify-center items-center relative overflow-hidden">
        
        {{-- Background Pattern & Glow --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#e5e7eb_1px,transparent_1px),linear-gradient(to_bottom,#e5e7eb_1px,transparent_1px)] bg-[size:32px_32px] opacity-50"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-primary-200/40 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="max-w-2xl mx-auto px-4 sm:px-6 relative z-10 w-full text-center">
            
            <x-ui.card class="bg-white/80 backdrop-blur-xl border-neutral-200 shadow-2xl shadow-primary-900/5 p-10 md:p-16 rounded-[2rem]">
                
                {{-- Icon Construction/Maintenance --}}
                <div class="relative w-24 h-24 mx-auto mb-8">
                    <div class="absolute inset-0 bg-primary-100 rounded-3xl rotate-6"></div>
                    <div class="absolute inset-0 bg-primary-950 text-white rounded-3xl -rotate-3 flex items-center justify-center shadow-lg transition-transform hover:rotate-0 duration-300">
                        <i class="fa-solid fa-person-digging text-4xl"></i>
                    </div>
                </div>

                <x-ui.badge variant="subtle" type="info" class="mb-4">
                    <i class="fa-solid fa-code-branch mr-1.5"></i> Sedang Dalam Pengembangan
                </x-ui.badge>

                <h1 class="text-3xl md:text-4xl font-display font-black text-primary-950 mb-4 tracking-tight leading-tight">
                    Portal Rekrutmen <br/> Sedang Disiapkan.
                </h1>

                <p class="text-neutral-500 font-body text-base md:text-lg leading-relaxed mb-10 max-w-lg mx-auto">
                    Halo, <span class="font-bold text-primary-950">{{ $company_name }}</span>! Kami sedang merancang pengalaman terbaik agar Anda bisa merekrut talenta unggulan Ruang Dampak dengan lebih mudah dan akurat. Harap nantikan pembaruan dari kami!
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <x-ui.button variant="outline" href="/" wire:navigate class="w-full sm:w-auto justify-center px-8 py-3.5">
                        <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Beranda
                    </x-ui.button>
                    
                    <x-ui.button variant="primary" href="mailto:partnership@ruangdampak.com" class="w-full sm:w-auto justify-center px-8 py-3.5 shadow-lg shadow-primary-950/20 hover:-translate-y-1">
                        Hubungi Tim Kami
                    </x-ui.button>
                </div>

            </x-ui.card>

            <p class="text-xs font-body text-neutral-400 mt-8">
                &copy; {{ date('Y') }} Ruang Dampak. All rights reserved.
            </p>
        </div>
    </div>
</x-layout.app>