<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produit; // Assurez-vous que ce chemin est correct

class ProduitSeeder extends Seeder
{
    public function run()
    {
        Produit::factory()->count(50)->create();
    }
}
