<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Usunięcie wszystkich użytkowników i zamówień
        DB::table('users')->delete();
        DB::table('orders')->delete();

        // Dodanie użytkowników
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@o2.pl',
                'password' => Hash::make('qwer1234'),
                'role' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'user',
                'email' => 'user@o2.pl',
                'password' => Hash::make('qwer1234'),
                'role' => 'user',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'spedytor',
                'email' => 'spedytor@o2.pl',
                'password' => Hash::make('qwer1234'),
                'role' => 'forwarder',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'driver',
                'email' => 'driver@o2.pl',
                'password' => Hash::make('qwer1234'),
                'role' => 'driver',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);

        // Wywołanie seedera OrdersSeeder
        $this->call(OrdersSeeder::class);
        $this->call(UserSeeder::class);
    }
}
