<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Vytvoríme testovacieho používateľa
        // Heslo bude automaticky nastavené na: password
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. Spustíme tvoj ProductSeeder (aby si mal aj produkty)
        $this->call([
            ProductSeeder::class,
        ]);
    }
}
