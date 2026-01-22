<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\Url;

class ProductList extends Component
{
    #[Url]
    public $category = ''; // Livewire bude sledovať ?category= v URL

    public function render()
    {
        // Filtrovanie produktov podľa kategórie
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
