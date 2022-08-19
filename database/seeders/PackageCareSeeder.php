<?php

namespace Database\Seeders;

use App\Models\Package_Care;
use Facade\Ignition\Support\Packagist\Package;
use Illuminate\Database\Seeder;

class PackageCareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 4; $i++) {
            Package_Care::insert(
                [
                    'name' => 'Lorem Ipsum',
                    'description' => 'Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident',
                    'price' => 40000000,
                    'count' => 8,
                    'image' =>  'ok'
                ],
            );
        };
    }
}
