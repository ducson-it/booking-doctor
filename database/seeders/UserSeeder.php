<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;
use Illuminate\Support\Facades\Hash;


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
                    'name' => $faker->userName,
                    'email' => $faker->safeEmail(),
                    'password' =>  Hash::make('123123123'),
                    'image' => 'ok',
                    'phone' => $faker->phoneNumber,
                    'address' => $faker->address,
                    'description' => $faker->text($maxNbChars = 500),
                    'level' => 'thac si',
                    'gender' => 'male',
                    'role_id' => Role::all()->random()->id,
                ],
            );
        };
    }
}
