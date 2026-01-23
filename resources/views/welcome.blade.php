<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>iStore - Premium Reseller</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
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
                        <a href="/kosik" class="text-gray-600 hover:text-black transition relative p-1">
                            <livewire:cart-counter />
                        </a>
                        <a href="{{ url('/dashboard') }}" class="text-xs font-medium text-gray-600 hover:text-black">Môj účet</a>
                    @else
                        <a href="{{ route('login') }}" class="text-xs font-medium text-gray-600 hover:text-black">Prihlásiť sa</a>
                        <a href="{{ route('register') }}" class="text-xs bg-black text-white px-3 py-1.5 rounded-full hover:bg-gray-800 transition">Registrovať</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- APPLE CATEGORY BAR --}}
    <div class="bg-white/90 backdrop-blur-md sticky top-16 z-40 border-b border-gray-100 w-full">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-center gap-8 py-4 overflow-x-auto no-scrollbar">
                <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 group min-w-[60px] transition-all">
                    <div class="w-10 h-10 flex items-center justify-center rounded-full {{ !request('category') ? 'bg-gray-200' : 'bg-gray-50' }} group-hover:scale-110 transition-transform">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16m-7 6h7" /></svg>
                    </div>
                    <span class="text-[11px] font-medium {{ !request('category') ? 'text-black font-bold' : 'text-gray-600' }}">Všetko</span>
                </a>
                @foreach($categories as $category)
                    <a href="?category={{ $category->slug }}" class="flex flex-col items-center gap-2 group min-w-[60px] transition-all">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-50 group-hover:scale-110 transition-transform">
                            @if($category->slug == 'iphone')
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="7" y="2" width="10" height="20" rx="2"/><circle cx="12" cy="18" r="1"/></svg>
                            @elseif($category->slug == 'mac')
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="4" y="4" width="16" height="12" rx="2"/><path d="M7 20h10"/></svg>
                            @elseif($category->slug == 'watch')
                                <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="8" y="6" width="8" height="12" rx="2"/><path d="M10 6V3h4v3M10 18v3h4v-3"/></svg>
                            @else
                                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
                            @endif
                        </div>
                        <span class="text-[11px] font-medium text-gray-600 group-hover:text-black">{{ $category->name }}</span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

<style>
    /* Skryje scrollbar ale zachová funkčnosť skrolovania na mobile */
    .no-scrollbar::-webkit-scrollbar { display: none; }
    .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
</style>

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

    <main class="relative z-50 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- Tento riadok teraz vykreslí všetko, čo máš v product-list.blade.php --}}
        <livewire:product-list />
    </main>

    <footer class="bg-gray-100 border-t border-gray-200 mt-20 py-12 text-center text-xs text-gray-500">
        <p>Toto je portfólio projekt vytvorený v Laravel 11 + Tailwind CSS.</p>
        <p class="mt-2">&copy; {{ date('Y') }} iStore Clone. Design inspired by Apple.</p>
    </footer>
@livewireScripts
</body>
</html>
