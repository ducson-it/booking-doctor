<?php

namespace Database\Seeders;

use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        Shift::insert(
            [
                'name' => '08-09h',
            ]
        );
        Shift::insert([
            'name' => '09-10h'
        ]
        );
        Shift::insert(
            [
                'name' => '11-12h',
            ]
        );
        Shift::insert(
            [
                'name' => '13-14h',
            ]
        );
        Shift::insert(
            [
                'name' => '14-15h',
            ]
        );
        Shift::insert(
            [
                'name' => '15-16h',
            ]
        );
        Shift::insert(
            [
                'name' => '16-17h',
            ]
        );
    }
}
