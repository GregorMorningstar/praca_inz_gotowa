<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Factory::create();

        // Utwórz kilku użytkowników za pomocą Faker'a
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->userName,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // Ustaw domyślne hasło
                'role' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
