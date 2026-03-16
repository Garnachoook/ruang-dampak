<x-layout.app navTheme="dark">
    <x-slot:title>Komunitas - Ruang Dampak</x-slot:title>

    <div class="bg-neutral-50 min-h-screen">
        {{-- Hero Section --}}
        <section class="relative bg-white pt-32 pb-20 overflow-hidden border-b border-neutral-200">
            <x-ui.background-pattern />
            
            <div class="max-w-4xl mx-auto px-4 text-center relative z-10">
                <h1 class="font-display font-black text-4xl md:text-5xl lg:text-6xl text-primary-950 mb-6 tracking-tight">
                    Bertumbuh Bersama, <br/>
                    <span class="text-primary-600">Komunitas Kami.</span>
                </h1>
                <p class="text-lg text-neutral-500 font-body max-w-2xl mx-auto leading-relaxed">
                    Forum diskusi eksklusif untuk bertanya, berjejaring, dan berkolaborasi membangun proyek nyata bersama praktisi industri.
                </p>
                
                <div class="inline-flex items-center gap-3 bg-white/5 border border-white/10 rounded-full px-6 py-2.5 backdrop-blur-sm">
                    <span class="relative flex h-3 w-3">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-950 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-3 w-3 bg-primary-950"></span>
                    </span>
                    <span class="text-sm text-primary-950 font-display font-bold uppercase tracking-widest">2.400+ Talenta Online</span>
                </div>
            </div>
        </section>

    </div>
</x-layout.app>