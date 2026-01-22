<div>
    {{-- Zobrazenie správy o úspechu --}}
    @if (session()->has('message'))
        <div class="mb-4 p-3 text-sm text-green-700 bg-green-100 rounded-lg flex items-center gap-2">
            <span>{{ session('message') }}</span>
        </div>
    @endif

    {{-- Samotné tlačidlo --}}
    <button wire:click="addToCart"
            wire:loading.attr="disabled"
            class="w-full md:w-auto bg-blue-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:bg-blue-700 transition shadow-lg shadow-blue-100 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2">

        {{-- Text, ktorý vidíš normálne --}}
        <span wire:loading.remove>Pridať do košíka</span>

        {{-- Text/Spinner, ktorý vidíš počas načítavania --}}
        <span wire:loading class="flex items-center gap-2">
            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
            Spracovávam...
        </span>
    </button>
</div>
