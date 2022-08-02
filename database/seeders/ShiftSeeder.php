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
                'name' => '10-11h',
            ]
        );
        Shift::insert([
            'name' => '11-12h'
        ]
        );
        Shift::insert(
            [
                'name' => '12-13h',
            ]
        );
    }
}
