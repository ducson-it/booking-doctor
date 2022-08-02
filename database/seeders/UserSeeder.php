<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 20; $i++) {
            User::insert(
                [
                    'name' => 'abc',
                    'email' => $faker->safeEmail(),
                    'password' => '123',
                    'image' => 'ok',
                    'phone' => '098772123',
                    'address' => 'nghe an',
                    'description' => 'ok con de',
                    'level' => 'thac si',
                    'gender' => 'male',
                    'role_id' => Role::all()->random()->id,
                ],
            );
        };
    }
}
