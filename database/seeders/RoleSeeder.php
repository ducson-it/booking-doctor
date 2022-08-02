<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Shift;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
            Role::insert(
                [
                    'name' => 'Admin',
                ]
            );
            Role::insert([
                'name' => 'Doctor'
            ]
            );
            Role::insert(
                [
                    'name' => 'Patient',
                ]
            );
    }
}
