<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 20; $i++) {
            Booking::insert(
                [
                    'doctor_id' => User::Where('role_id', '=', 2)->get()->random()->id,
                    'patient_id' =>  User::Where('role_id', '=', 3)->get()->random()->id,
                    'status' => $faker->randomElement(['1','2','3']),
                    'date' => '2022-08-17',
                    'shiftId' => Shift::all()->random()->id,
                    // 'package_id' => 1,
                    // 'count' => 8,
                ],
            );
        };
    }
}
