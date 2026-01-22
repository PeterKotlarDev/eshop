<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth; // Uisti sa, že je tu tento import
use Livewire\Attributes\On;

class CartCounter extends Component
{
    #[On('cart-updated')]
    public function render()
    {
        // Auth::id() vráti ID alebo null, nikdy nevyhodí chybu "Undefined method id"
        $userId = Auth::id();

        $count = $userId
            ? CartItem::where('user_id', $userId)->sum('quantity')
            : 0;

        return view('livewire.cart-counter', ['count' => $count]);
    }
}
