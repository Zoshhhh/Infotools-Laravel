<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produit;

class ProduitFactory extends Factory
{
    protected $model = Produit::class;

    public function definition()
    {
        return [
            'nomCli' => $this->faker->lastName,
            'prenomCli' => $this->faker->firstName,
            'mailCli' => $this->faker->safeEmail,
            'telCli' => $this->faker->randomNumber(9, true),
            'villeCli' => $this->faker->city,
            'rueCli' => $this->faker->streetAddress,
            'cpCli' => $this->faker->postcode,
            'prospect' => $this->faker->randomElement(['Oui', 'Non']),
        ];
    }
}
