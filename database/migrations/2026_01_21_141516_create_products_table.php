<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Názov (napr. iPhone 15)
            $table->string('slug')->unique(); // URL priateľský názov (iphone-15)
            $table->text('description');     // Popis produktu
            $table->decimal('price', 10, 2); // Cena (napr. 999.99)
            $table->integer('stock')->default(0); // Počet kusov na sklade
            $table->string('image')->nullable();  // Cesta k obrázku
            $table->timestamps();            // created_at a updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};


