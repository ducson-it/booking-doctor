<?php

namespace Database\Seeders;

use App\Models\Doctor_Shift;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 20; $i++) {
            Doctor_Shift::insert(
                [
                    'shift_doctor_id' => Shift::all()->random()->id,
                    'doctor_id' => User::where('role_id', '=', '1')->get()->random()->id
                ],
            );
        };
    }
}
