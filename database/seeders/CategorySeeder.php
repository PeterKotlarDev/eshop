<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;          // Toto tam chýbalo
use Illuminate\Support\Str;       // Aj toto tam chýbalo

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Mac', 'iPad', 'iPhone', 'Watch', 'AirPods', 'Príslušenstvo'];

        foreach ($categories as $cat) {
            Category::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }
    }
}
