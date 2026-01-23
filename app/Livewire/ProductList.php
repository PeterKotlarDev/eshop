<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\CartItem; // Musí tu byť
use Illuminate\Support\Facades\Auth; // Musí tu byť
use Livewire\Attributes\Url;

class ProductList extends Component
{
    #[Url]
    public $category = '';

    // TÁTO METÓDA TU MUSÍ BYŤ (Pridaj ju pred alebo za render)
    public function addToCart($productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $productId)
            ->first();

        if ($cartItem) {
            $cartItem->increment('quantity');
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        $this->dispatch('cart-updated');
        session()->flash('message', 'Produkt pridaný!');
    }

    public function render()
    {
        $products = Product::query()
            ->when($this->category, function ($query) {
                $query->whereHas('category', function ($q) {
                    $q->where('slug', $this->category);
                });
            })
            ->get();

        return view('livewire.product-list', [
            'products' => $products
        ]);
    }
}
