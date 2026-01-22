<div>
    @if($items->isEmpty())
        <div class="text-center py-20">
            <div class="mb-6 flex justify-center">
                <div class="bg-gray-100 p-6 rounded-full">
                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-gray-500 text-xl font-medium">Váš košík je momentálne prázdny.</p>
            <a href="/" class="mt-6 inline-block bg-black text-white px-8 py-3 rounded-full hover:bg-gray-800 transition">
                Pokračovať v nákupe
            </a>
        </div>
    @else
        <div class="space-y-6">
            @foreach($items as $item)
                {{-- ... tvoj kód pre položky (ten zostáva rovnaký) ... --}}
                <div class="flex flex-col sm:flex-row justify-between items-center border-b border-gray-100 pb-6 mb-6 last:border-0">
                    <div class="flex items-center gap-6 w-full sm:w-auto">
                        <div class="w-20 h-20 bg-gray-50 rounded-xl p-2 flex-shrink-0">
                            <img src="{{ asset('images/'.$item->product->image) }}" class="w-full h-full object-contain" onerror="this.src='https://placehold.co/100x100?text=Apple'">
                        </div>
                        <div>
                            <h4 class="font-bold text-lg text-gray-900">{{ $item->product->name }}</h4>
                            <p class="text-sm text-gray-400">{{ number_format($item->product->price, 0) }} € / ks</p>
                        </div>
                    </div>

                    <div class="flex items-center justify-between sm:justify-end gap-8 w-full sm:w-auto mt-4 sm:mt-0">
                        <div class="flex items-center bg-gray-100 rounded-full p-1 border border-gray-200">
                            <button wire:click="decrement({{ $item->id }})" class="w-8 h-8 flex items-center justify-center hover:bg-white rounded-full transition shadow-sm disabled:opacity-30" {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"/></svg>
                            </button>
                            <span class="px-3 font-semibold text-sm w-10 text-center">{{ $item->quantity }}</span>
                            <button wire:click="increment({{ $item->id }})" class="w-8 h-8 flex items-center justify-center hover:bg-white rounded-full transition shadow-sm">
                                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            </button>
                        </div>
                        <div class="text-right min-w-[80px]">
                            <p class="font-bold text-lg">{{ number_format($item->product->price * $item->quantity, 0) }} €</p>
                        </div>
                        <button wire:click="removeItem({{ $item->id }})" class="text-gray-300 hover:text-red-500 transition-colors p-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- FINÁLNA SUMA A TLAČIDLÁ --}}
        <div class="mt-10 pt-8 border-t border-gray-200">
            <div class="flex justify-between items-center mb-10">
                <span class="text-gray-500 font-medium">Spolu na úhradu:</span>
                <span class="text-3xl font-black text-gray-900">{{ number_format($total, 0) }} €</span>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                {{-- NÁVRAT DOMOV --}}
                <a href="/" class="text-blue-600 hover:underline flex items-center gap-2 font-medium order-2 sm:order-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Pokračovať v nákupe
                </a>

                {{-- TLAČIDLO DO POKLADNE --}}
                <button class="w-full sm:w-auto bg-blue-600 text-white px-10 py-4 rounded-full font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-100 order-1 sm:order-2">
                    Objednať teraz
                </button>
            </div>
        </div>
    @endif
</div>
