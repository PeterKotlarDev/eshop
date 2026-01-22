<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CartItem extends Model
{
    // Povolíme hromadné vypĺňanie týchto polí
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Položka v košíku patrí konkrétnemu produktu (napr. iPhone 15)
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
