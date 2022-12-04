<?php

namespace Database\Seeders\Region5;

use App\Models\Barangay;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Region5_CamarinesSur_Cities_BarangaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entityCity = DB::table('entity')->where('Entity', 'City')->value('id');
        
        $csvFile = [];

        // CamarinesSur Cities
        $csvFile[0] = fopen(base_path("database/data/Province_CamarinesSur_Cities/CamarinesSur_IrigaCity_Barangays.csv"), "r");
        $csvFile[1] = fopen(base_path("database/data/Province_CamarinesSur_Cities/CamarinesSur_NagaCity_Barangays.csv"), "r");

        
        for ($i=0; $i < count($csvFile); $i++) {
            
            $firstline = true;
            $position = 1;
            $counter = 0;

            while(($data = fgetcsv($csvFile[$i], 2000, ",")) !== false)
            {
                if(!$firstline)
                {
                    if ($counter == 1) 
                    {
                        $city_id = DB::table('cities')->where('city', utf8_encode($data['2']))->where('code', utf8_encode($data['3']))->value('id');
                    }

                    $cities[] = [
                        "entity_id" => $entityCity, // entity id 2 = City
                        "city_id" => $city_id, 
                        "barangay" => utf8_encode($data['0']),
                        "code" => utf8_encode($data['1']),
                        "initdt" => Carbon::now(),
                        "upddt" => Carbon::now(),
                        "initid" => 1,
                        "updid" => 1
                    ];

                    $position++;
                }
                $firstline = false;
                $counter++;
    
            }
    
            fclose($csvFile[$i]);

        }

        foreach(array_chunk($cities, 1000) as $chunk)
        {
            Barangay::insert($chunk);
        }
    }
}
