<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use Illuminate\Support\Facades\Hash;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employer::create([
            'last_name' => 'Doe',
            'first_name' => 'John',
            'email' => 'kevinstacchetti@gmail.com',
            'password' => Hash::make('Kevin2004.'), // Utiliser la fonction de hachage pour le mot de passe
            'role' => 'salesperson', // Rôle de l'employé, peut être 'salesperson', 'manager', etc.
            'ad_id' => '001', // ID de l'employé pour votre système interne, s'il y en a un
        ]);

    }
}
