<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client; 
use Faker\Factory as Faker;

class ClientSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Client::create([
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'email' => $faker->unique()->email, 
                'phone' => $faker->phoneNumber,
                'address' => $faker->address,
                'type' => $faker->boolean 
            ]);
        }
    }
}
