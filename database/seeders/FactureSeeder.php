<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facture; // Assurez-vous que ce chemin est correct

class FactureSeeder extends Seeder
{
    public function run()
    {
        Facture::factory(50)->create(); // Crée 50 instances de Facture
    }
}
