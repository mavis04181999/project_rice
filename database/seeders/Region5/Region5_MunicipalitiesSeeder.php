<?php

namespace Database\Seeders\Region5;

use App\Models\Municipality;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Region5_MunicipalitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = [];

        $csvFile[0] = fopen(base_path("database/data/Bicol_Region_Municipalities/Province_Albay_Municipalities.csv"), "r");
        $csvFile[1] = fopen(base_path("database/data/Bicol_Region_Municipalities/Province_CamarinesNorte_Municipalities.csv"), "r");
        $csvFile[2] = fopen(base_path("database/data/Bicol_Region_Municipalities/Province_CamarinesSur_Municipalities.csv"), "r");
        $csvFile[3] = fopen(base_path("database/data/Bicol_Region_Municipalities/Province_Catanduanes_Municipalities.csv"), "r");
        $csvFile[4] = fopen(base_path("database/data/Bicol_Region_Municipalities/Province_Masbate_Municipalities.csv"), "r");
        $csvFile[5] = fopen(base_path("database/data/Bicol_Region_Municipalities/Province_Sorsogon_Municipalities.csv"), "r");

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
                        $province_id = DB::table('provinces')->where('province', utf8_encode($data['2']))->where('code', utf8_encode($data['3']))->value('id');
                    }

                    $municipalities[] = [
                        "province_id" => $province_id,
                        "municipality" => utf8_encode($data['0']),
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

        foreach(array_chunk($municipalities, 1000) as $chunk)
        {
            Municipality::insert($chunk);
        }
    }
}
