<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rdv>
 */
class RdvFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dateRdv' => $this->faker->dateTimeBetween('+1 days', '+1 year')->format('Y-m-d H:i:s'),
            'idCli' => \App\Models\Client::factory(),
            'description' => $this->faker->sentence,
        ];
    }
}
