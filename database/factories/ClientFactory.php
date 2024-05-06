<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomCli' => $this->faker->lastName,
            'prenomCli' => $this->faker->firstName,
            'mailCli' => $this->faker->unique()->safeEmail,
            'telCli' => $this->faker->numerify('#########'),
            'villeCli' => $this->faker->city,
            'rueCli' => $this->faker->streetAddress,
            'cpCli' => $this->faker->postcode(),
            'prospect' => $this->faker->randomElement(['Oui', 'Non']),
        ];
    }
}
