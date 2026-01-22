<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // 1. Najprv pridáme stĺpec (nullable je dôležité, ak už máš v tabuľke produkty)
            $table->foreignId('category_id')->after('id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Tu definujeme, ako zmenu vrátiť späť
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
