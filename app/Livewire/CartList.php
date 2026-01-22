<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartList extends Component
{
    // Zvýšenie množstva o 1
    public function increment($itemId)
    {
        $item = CartItem::where('id', $itemId)
                        ->where('user_id', Auth::id())
                        ->first();

        if ($item) {
            $item->increment('quantity');
            $this->dispatch('cart-updated'); // Aktualizuje ikonku v navigácii
        }
    }

    // Zníženie množstva o 1 (minimálne na 1)
    public function decrement($itemId)
    {
        $item = CartItem::where('id', $itemId)
                        ->where('user_id', Auth::id())
                        ->first();

        if ($item && $item->quantity > 1) {
            $item->decrement('quantity');
            $this->dispatch('cart-updated');
        }
    }

    public function removeItem($itemId)
    {
        $item = CartItem::where('id', $itemId)
                        ->where('user_id', Auth::id())
                        ->first();

        if ($item) {
            $item->delete();
            $this->dispatch('cart-updated');
            session()->flash('message', 'Produkt bol odstránený.');
        }
    }

    public function render()
    {
        $items = CartItem::with('product')
                    ->where('user_id', Auth::id())
                    ->get();

        return view('livewire.cart-list', [
            'items' => $items,
            'total' => $items->sum(fn($i) => $i->product->price * $i->quantity)
        ]);
    }
}
