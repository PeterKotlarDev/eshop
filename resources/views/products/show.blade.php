<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $product->name }} - iStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-[#1d1d1f] antialiased">
    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 h-16 flex justify-between items-center">
            <a href="/" class="font-semibold text-lg tracking-tight flex items-center gap-2">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.84 1.53-2.95 1.5-.83-4.15-4.65-4.65-4.65-4.65z"/></svg>
                iStore
            </a>
            <a href="/" class="text-sm text-blue-600 hover:underline">Späť na zoznam</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="bg-[#f5f5f7] rounded-3xl p-12 flex items-center justify-center">
                <img src="{{ asset('images/' . $product->image) }}"
                     onerror="this.src='https://placehold.co/600x600/f5f5f7/1d1d1f?text={{ $product->name }}'"
                     alt="{{ $product->name }}"
                     class="max-h-[500px] object-contain">
            </div>

            <div>
                <span class="text-orange-600 text-sm font-bold uppercase tracking-widest">Novinka</span>
                <h1 class="text-5xl font-bold mt-4 mb-6 tracking-tight">{{ $product->name }}</h1>
                <p class="text-xl text-gray-500 leading-relaxed mb-8">{{ $product->description }}</p>

                <div class="border-t border-gray-200 pt-8">
                    <p class="text-3xl font-semibold mb-6 text-gray-900">{{ number_format($product->price, 0, ',', ' ') }} €</p>

                    <button class="w-full md:w-auto bg-blue-600 text-white px-12 py-4 rounded-full font-semibold text-lg hover:bg-blue-700 transition shadow-lg shadow-blue-100">
                        Pridať do košíka
                    </button>

                    <p class="mt-6 text-sm text-gray-500 flex items-center gap-2">
                        <svg class="w-5 h-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Na sklade: {{ $product->stock }} ks
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
