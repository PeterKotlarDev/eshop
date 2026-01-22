<div>
    {{-- Tu len samotná tabuľka s produktmi, ktorú som ti posielal v predchádzajúcej správe --}}
    @if($items->isEmpty())
        <p>Košík je prázdny.</p>
    @else
        @foreach($items as $item)
            <div class="flex justify-between items-center border-b pb-4 mb-4">
                {{-- Detail produktu a tlačidlo zmazať --}}
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/'.$item->product->image) }}" class="w-16 h-16 object-contain">
                    <div>
                        <h4 class="font-bold">{{ $item->product->name }}</h4>
                        <p class="text-sm text-gray-500">{{ $item->quantity }} ks</p>
                    </div>
                </div>
                <div class="flex items-center gap-4">
                    <span class="font-bold">{{ number_format($item->product->price * $item->quantity, 0) }} €</span>
                    <button wire:click="removeItem({{ $item->id }})" class="text-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                    </button>
                </div>
            </div>
        @endforeach
        <div class="text-right text-2xl font-bold mt-4">
            Celkom: {{ number_format($total, 0) }} €
        </div>
    @endif
</div>
