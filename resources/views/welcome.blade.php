<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iStore - Premium Reseller</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F5F5F7] text-[#1d1d1f] antialiased">

    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.84 1.53-2.95 1.5-.83-4.15-4.65-4.65-4.65-4.65z"/></svg>
                    <span class="font-semibold text-lg tracking-tight">iStore</span>
                </div>

                <div class="hidden md:flex space-x-8 text-xs font-medium text-gray-600">
                    <a href="#" class="hover:text-black transition-colors">Mac</a>
                    <a href="#" class="hover:text-black transition-colors">iPad</a>
                    <a href="#" class="hover:text-black transition-colors">iPhone</a>
                    <a href="#" class="hover:text-black transition-colors">Watch</a>
                </div>

                <div class="flex items-center gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-xs font-medium text-gray-600 hover:text-black">Môj účet</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-medium text-gray-600 hover:text-black">Prihlásiť sa</a>
                        <a href="{{ route('register') }}" class="text-xs bg-black text-white px-3 py-1.5 rounded-full hover:bg-gray-800 transition">Registrovať</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="pt-16 pb-12 text-center bg-white">
        <div class="max-w-7xl mx-auto px-4 py-16 sm:px-6 lg:px-8 flex flex-col items-center">
            <h2 class="text-5xl md:text-7xl font-bold tracking-tight text-black mb-4">iPhone 15 Pro</h2>
            <p class="text-2xl md:text-3xl text-gray-500 font-medium mb-8">Titán. Tak robustný. Tak ľahký. Tak pro.</p>
            <div class="flex gap-4">
                <button class="bg-blue-600 text-white px-6 py-2 rounded-full text-base hover:bg-blue-700 transition">Kúpiť</button>
                <a href="#" class="text-blue-600 px-6 py-2 text-base hover:underline flex items-center">Zistiť viac <span class="ml-1 text-xs">›</span></a>
            </div>
            </div>
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h3 class="text-2xl font-bold text-gray-900 mb-8">Najnovšie produkty</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($products as $product)
                <div class="group relative bg-white rounded-[20px] shadow-sm hover:shadow-xl hover:scale-[1.01] transition-all duration-300 p-8 flex flex-col items-center text-center">

                    <span class="absolute top-4 left-4 text-[10px] font-bold text-orange-600 uppercase tracking-wide">Novinka</span>

                    <div class="h-56 w-full flex items-center justify-center mb-6">
                        <img src="{{ asset('images/' . $product->image) }}"
                             onerror="this.src='https://placehold.co/300x300/f5f5f7/1d1d1f?text={{ $product->name }}'"
                             alt="{{ $product->name }}"
                             class="max-h-full object-contain mix-blend-multiply group-hover:scale-110 transition-transform duration-500">
                    </div>

                    <div class="flex-grow flex flex-col items-center">
                        <a href="{{ route('products.show', $product->slug) }}">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-2">{{ $product->name }}</h2>
                        </a>
                        <p class="text-sm text-gray-500 mb-6 max-w-xs mx-auto">{{ $product->description }}</p>
                    </div>

                    <div class="w-full flex justify-between items-center pt-4 border-t border-gray-100 mt-auto">
                        <div class="text-left">
                            <p class="text-xs text-gray-500">Cena od</p>
                            <p class="text-lg font-bold text-gray-900">{{ number_format($product->price, 0, ',', ' ') }} €</p>
                        </div>
                        <button class="bg-blue-600 text-white text-sm px-5 py-2 rounded-full font-medium hover:bg-blue-700 transition-colors shadow-md shadow-blue-200">
                            Kúpiť
                        </button>
                    </div>

                </div>
            @endforeach
        </div>
    </main>

    <footer class="bg-gray-100 border-t border-gray-200 mt-20 py-12 text-center text-xs text-gray-500">
        <p>Toto je portfólio projekt vytvorený v Laravel 11 + Tailwind CSS.</p>
        <p class="mt-2">&copy; {{ date('Y') }} iStore Clone. Design inspired by Apple.</p>
    </footer>

</body>
</html>
