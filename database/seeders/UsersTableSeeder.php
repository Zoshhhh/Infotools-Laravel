<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds..
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Kévin Stacchetti',
            'email' => 'kevinstacchett@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Kevin2004.'),
            'current_team_id' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
