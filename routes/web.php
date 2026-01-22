<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;

// 1. Tvoja hlavná stránka, ktorá ťahá produkty z databázy
Route::get('/', [ProductController::class, 'index'])->name('home');

// 2. Štandardné trasy od Breeze (Dashboard a Profil)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/produkt/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::get('/kosik', function () {
    // Auth::id() vráti priamo číslo, Intelephense s tým nemá problém
    $items = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();

    return view('cart', compact('items'));
})->middleware('auth');

// 3. Import prihlasovacej logiky (login, register, logout)
require __DIR__.'/auth.php';
