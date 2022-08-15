<?php

namespace Database\Seeders;

use App\Models\Doctor_Shift;
use App\Models\Role;
use App\Models\Shift;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            // ShiftSeeder::class,
            // RoleSeeder::class,
            // UserSeeder::class,
            // DoctorShiftSeeder::class,
            BookingSeeder::class,
            // PackageCareSeeder::class
        ]);
    }
}
