<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Vytvoríme testovacieho používateľa
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // 2. SPÚŠŤAME SEEDERY (Poradie je kľúčové!)
        $this->call([
            CategorySeeder::class, // NAJPRV kategórie (aby ich mal kto priradiť k produktom)
            ProductSeeder::class,  // POTOM produkty
        ]);
    }
}
