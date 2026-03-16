@props([
    'id',
    'title',
])

<!-- Modal Component triggered by x-data -->
<div 
    x-data="{ show: false }" 
    x-show="show" 
    @open-modal.window="if ($event.detail === '{{ $id }}') show = true"
    @close-modal.window="if ($event.detail === '{{ $id }}') show = false"
    @keydown.escape.window="show = false"
    style="display: none;"
    class="fixed inset-0 z-50 flex items-center justify-center overflow-y-auto overflow-x-hidden p-4 sm:p-6"
>
    <!-- Backdrop -->
    <div 
        x-show="show" 
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 bg-primary-950/60 backdrop-blur-sm transition-opacity"
        @click="show = false"
        aria-hidden="true"
    ></div>

    <!-- Modal Panel -->
    <div 
        x-show="show"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        class="relative w-full max-w-lg transform rounded-2xl bg-white p-6 sm:p-8 text-left shadow-primary transition-all flex flex-col gap-6"
    >
        <!-- Header -->
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-display font-bold text-primary-900">
                {{ $title }}
            </h3>
            <button 
                @click="show = false" 
                class="rounded-lg p-2 text-neutral-400 hover:bg-neutral-100 hover:text-neutral-600 transition-colors focus:outline-none focus:ring-2 focus:ring-primary-500"
            >
                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Content -->
        <div class="font-body text-neutral-600">
            {{ $slot }}
        </div>
    </div>
</div>
