<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Váš košík - iStore</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F5F5F7] text-[#1d1d1f] antialiased">

    {{-- IDENTICKÁ NAVIGÁCIA AKO NA DOMOVSKEJ STRÁNKE --}}
    <nav class="fixed w-full z-50 bg-white/80 backdrop-blur-md border-b border-gray-200 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                    <svg class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.84 1.53-2.95 1.5-.83-4.15-4.65-4.65-4.65-4.65z"/></svg>
                    <span class="font-semibold text-lg tracking-tight">iStore</span>
                </a>

                <div class="hidden md:flex space-x-8 text-xs font-medium text-gray-600">
                    <a href="#" class="hover:text-black transition-colors">Mac</a>
                    <a href="#" class="hover:text-black transition-colors">iPad</a>
                    <a href="#" class="hover:text-black transition-colors">iPhone</a>
                    <a href="#" class="hover:text-black transition-colors">Watch</a>
                </div>

                <div class="flex items-center gap-4">
                @auth
                    <a href="/kosik" class="text-gray-600 hover:text-black transition relative p-1">
                        <livewire:cart-counter />
                    </a>
                    {{-- Namiesto logoutu dáme len odkaz na domov alebo profil --}}
                    <a href="/" class="text-xs font-medium text-gray-600 hover:text-black italic">
                        Prihlásený: {{ auth()->user()->name }}
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-xs font-medium text-gray-600 hover:text-black">Prihlásiť sa</a>
                    <a href="{{ route('register') }}" class="text-xs bg-black text-white px-3 py-1.5 rounded-full hover:bg-gray-800 transition">Registrovať</a>
                @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- OBSAH KOŠÍKA --}}
    <main class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-32 pb-20">
        <div class="bg-white rounded-[32px] shadow-sm p-8 md:p-12">
            <h1 class="text-4xl font-bold tracking-tight text-gray-900 mb-10">Váš nákupný košík</h1>

            {{-- TVOJ LIVEWIRE KOMPONENT --}}
            <livewire:cart-list />
        </div>
    </main>

    <footer class="bg-white border-t border-gray-200 py-12 text-center text-xs text-gray-500">
        <p>&copy; {{ date('Y') }} iStore Clone. Design inspired by Apple.</p>
    </footer>

    @livewireScripts
</body>
</html>
