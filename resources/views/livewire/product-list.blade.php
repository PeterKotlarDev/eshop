<div>
    <h3 class="text-2xl font-bold text-gray-900 mb-8">
        {{ $category ? 'Kategória: ' . ucfirst($category) : 'Všetky produkty' }}
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($products as $product)
            <div class="bg-white rounded-[24px] p-6 shadow-sm hover:shadow-md transition-all border border-gray-100 flex flex-col items-center">
                <img src="{{ asset('images/' . $product->image) }}" class="h-48 object-contain mb-4">
                <a href="/product/{{ $product->slug }}" class="hover:underline">
    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
</a>
                <p class="text-gray-500 text-sm mb-4">{{ $product->description }}</p>
                <div class="mt-auto flex justify-between items-center w-full">
                    <span class="font-bold text-lg">{{ number_format($product->price, 0, ',', ' ') }} €</span>
                    <button wire:click="addToCart({{ $product->id }})" class="bg-blue-600 text-white text-sm px-5 py-2 rounded-full font-medium hover:bg-blue-700 transition-colors shadow-md shadow-blue-200 active:scale-95">
                        Kúpiť
                    </button>
                </div>
            </div>
        @empty
            <p class="col-span-full text-center text-gray-500 py-10">V tejto kategórii nie sú žiadne produkty.</p>
        @endforelse
    </div>
</div>
