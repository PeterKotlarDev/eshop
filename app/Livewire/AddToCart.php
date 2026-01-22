<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $productId; // Toto ID dostaneme zo stránky produktu

    public function mount($productId)
    {
        $this->productId = $productId;
    }

    public function addToCart()
    {
        // 1. Skontrolujeme, či je užívateľ prihlásený
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // 2. Nájdeme, či už tento produkt v košíku má
        $cartItem = CartItem::where('user_id', Auth::id())
                            ->where('product_id', $this->productId)
                            ->first();

        if ($cartItem) {
            // Ak už je v košíku, len zvýšime počet kusov
            $cartItem->increment('quantity');
        } else {
            // Ak nie je, vytvoríme nový záznam
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $this->productId,
                'quantity' => 1
            ]);
        }

        // 3. Pošleme správu užívateľovi (Flash message)
        session()->flash('message', 'Produkt bol pridaný do košíka ✅');

        // Voliteľné: Emit eventu, aby sa aktualizovalo počítadlo v menu (to spravíme neskôr)
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
