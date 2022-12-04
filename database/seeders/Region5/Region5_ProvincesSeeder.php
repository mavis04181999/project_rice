<?php

namespace Database\Seeders\Region5;

use App\Models\Province;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Region5_ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/Bicol_Region_Provinces/region_v_provinces.csv"), "r");

        $firstline = true;

        while(($data = fgetcsv($csvFile, 2000, ",")) !== false)
        {
            if(!$firstline)
            {
                Province::create([
                    "province" => utf8_encode($data['0']),
                    "code" => utf8_encode($data['1']),
                    "initdt" => Carbon::now(),
                    "upddt" => Carbon::now(),
                    "initid" => 1,
                    "updid" => 1,
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
        
    }
}
