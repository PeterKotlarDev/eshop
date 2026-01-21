<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        // Vytiahneme všetky produkty z databázy
        $products = Product::all();

        // Pošleme ich do súboru welcome.blade.php
        return view('welcome', compact('products'));
    }

    public function show($slug): \Illuminate\View\View
    {
        // Vyhľadáme produkt podľa slugu, ak neexistuje, hodíme chybu 404
        $product = \App\Models\Product::where('slug', $slug)->firstOrFail();

        return view('products.show', compact('product'));
    }
}
