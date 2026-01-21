<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create([
            'name' => 'iPhone 15 Pro',
            'slug' => 'iphone-15-pro',
            'description' => 'Titanové telo, čip A17 Pro a revolučný systém kamier.',
            'price' => 1199.00,
            'stock' => 10,
            'image' => 'iphone15pro.jpg'
        ]);

        \App\Models\Product::create([
            'name' => 'MacBook Air M3',
            'slug' => 'macbook-air-m3',
            'description' => 'Najpopulárnejší notebook na svete je teraz ešte výkonnejší.',
            'price' => 1299.00,
            'stock' => 5,
            'image' => 'macbookm3.jpg'
        ]);

        \App\Models\Product::create([
        'name' => 'iPad Pro M4',
        'slug' => 'ipad-pro-m4',
        'description' => 'Neuveriteľne tenký. Šialene výkonný. S OLED displejom.',
        'price' => 1049.00,
        'stock' => 15,
        'image' => 'ipadpro.jpg'
        ]);
    }
}




