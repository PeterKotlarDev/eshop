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
        Schema::create('cart_items', function (Blueprint $table) {
        $table->id();
        // Prepojíme košík s prihláseným užívateľom
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        // Prepojíme košík s produktom
        $table->foreignId('product_id')->constrained()->onDelete('cascade');
        // Počet kusov
        $table->integer('quantity')->default(1);
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
