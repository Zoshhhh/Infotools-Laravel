<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Product::create([
                'name' => 'Produit ' . Str::random(10), 
                'description' => 'Description pour le produit ' . $i, 
                'price' => rand(100, 1000), 
                'stock' => rand(10, 100), 
            ]);
        }
    }
}
