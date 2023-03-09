<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genders')->insert(
            [
                [
                    "name"         => "Masculino",
                    "abbreviation" => "M"
                ],
                [
                    "name"         => "Femenino",
                    "abbreviation" => "F"
                ]
            ]
        );
        
    }
}
