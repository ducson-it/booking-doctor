<?php

namespace Database\Seeders;

use App\Models\Booking;
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
                    'doctor_name' => 'abc',
                    'patient_name' => 'abc',
                    'shift_name' => 'abc',
                    'status' => $faker->randomElement(['1','2','3']),
                ],
            );
        };
    }
}
