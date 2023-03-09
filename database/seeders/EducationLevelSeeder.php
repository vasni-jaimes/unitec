<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class EducationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('educational_levels')->insert(
            [
                ["name" => "Preparatoria"],
                ["name" => "Licenciatura"],
                ["name" => "Posgrado"]
            ]
        );
    }
}
