<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartList extends Component
{
    public function removeItem($itemId)
    {
        // Nájdeme položku a skontrolujeme, či patrí prihlásenému používateľovi
        $item = CartItem::where('id', $itemId)
                        ->where('user_id', Auth::id())
                        ->first();

        if ($item) {
            $item->delete();

            // Oznámime počítadlu v navigácii, že sa niečo zmenilo
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
