<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\User;
use App\Enum\OrderStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersSeeder extends Seeder
{
    public function run()
    {
        // Usuwanie istniejących danych
        DB::table('orders')->delete();

        // Tworzenie instancji Faker
        $faker = \Faker\Factory::create();

        // Pobieranie istniejących ID użytkowników
        $userIds = User::pluck('id')->toArray();

        for ($i = 0; $i < 50; $i++) {
            Orders::create([
                'miejsce_zaladunku' => $faker->city,
                'data_zaladunku' => $faker->date(),
                'miejsce_docelowe' => $faker->city,
                'data_rozladunku' => $faker->date(),
                'user_id' => $faker->randomElement($userIds),
                'dystans' => $faker->randomNumber(3),
                'cena' => $faker->randomFloat(2, 100, 1000),
                'role' => $faker->randomElement(OrderStatus::ORDERSTATUS),
            ]);
        }
    }
}
