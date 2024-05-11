<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProspectsSeeder extends Seeder
{
    /**
     * Exécutez les seeds de la base de données.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { 
            DB::table('prospects')->insert([
                'last_name' => Str::random(10), 
                'first_name' => Str::random(10),
                'email' => Str::random(10).'@example.com', 
                'phone' => '123-456-'.rand(1000, 9999), 
                'address' => Str::random(20), 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
