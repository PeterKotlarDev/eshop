<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\CartItem;
use App\Models\Category;
use App\Models\Product;

// 1. Domovská stránka (Kategórie pridáme v ProductController@index)
Route::get('/', [ProductController::class, 'index'])->name('home');

// 2. Detail produktu
Route::get('/produkt/{slug}', [ProductController::class, 'show'])->name('products.show');

// 3. Košík (Pridali sme načítanie kategórií sem dovnútra)
Route::get('/kosik', function () {
    $categories = Category::all();
    $items = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();

    return view('cart', compact('items', 'categories'));
})->middleware('auth');

// 4. Breeze trasy
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';




Route::get('/', function () {
    $products = Product::all();
    $categories = Category::all();

    return view('welcome', compact('products', 'categories'));
})->name('home');
