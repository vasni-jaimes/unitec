<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('marital_statuses')->insert(
            [
                ["name" => "Soltero"],
                ["name" => "Casado"],
                ["name" => "Divorciado"],
                ["name" => "Viudo"]
            ]
        );
    }
}
