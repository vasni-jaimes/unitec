<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('careers')->insert(
            [
                [
                    "educational_level_id" => 2,
                    "name"                 => "Lic. En Derecho"
                ],
                [
                    "educational_level_id" => 2,
                    "name"                 => "Lic. En Finanzas"
                ],
                [
                    "educational_level_id" => 3,
                    "name"                 => "Mtria. Admon. De Negocios"
                ],
                [
                    "educational_level_id" => 3,
                    "name"                 => "Mtria. Direccion de proyectos"
                ]
            ]
        );
    }
}
