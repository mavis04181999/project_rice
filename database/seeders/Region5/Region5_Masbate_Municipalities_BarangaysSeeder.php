<?php

namespace Database\Seeders\Region5;

use App\Models\Barangay;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Region5_Masbate_Municipalities_BarangaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entityMunicipality = DB::table('entity')->where('Entity', 'Municipality')->value('id');
        
        $csvFile = [];

        // Masbate
        $csvFile[0] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Aroroy_Barangay.csv"), "r");
        $csvFile[1] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Baleno_Barangay.csv"), "r");
        $csvFile[2] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Balud_Barangay.csv"), "r");
        $csvFile[3] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Batuan_Barangay.csv"), "r");
        $csvFile[4] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Cataingan_Barangay.csv"), "r");
        $csvFile[5] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Cawayan_Barangay.csv"), "r");
        $csvFile[6] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Claveria_Barangay.csv"), "r");
        $csvFile[7] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Dimasalang_Barangay.csv"), "r");
        $csvFile[8] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Esperanza_Barangay.csv"), "r");
        $csvFile[9] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Mandaon_Barangay.csv"), "r");
        $csvFile[10] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Milagros_Barangay.csv"), "r");
        $csvFile[11] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Mobo_Barangay.csv"), "r");
        $csvFile[12] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Monreal_Barangay.csv"), "r");
        $csvFile[13] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Palanas_Barangay.csv"), "r");
        $csvFile[14] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Pio_V_Corpuz_Barangay.csv"), "r");
        $csvFile[15] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Placer_Barangay.csv"), "r");
        $csvFile[16] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_San_Fernando_Barangay.csv"), "r");
        $csvFile[17] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_San_Jacinto_Barangay.csv"), "r");
        $csvFile[18] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_San_Pascual_Barangay.csv"), "r");
        $csvFile[18] = fopen(base_path("database/data/Province_Masbate_Municipalities/Masbate_Uson_Barangay.csv"), "r");

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
                        $municipality_id = DB::table('municipalities')->where('municipality', utf8_encode($data['2']))->where('code', utf8_encode($data['3']))->value('id');
                    }

                    $cities[] = [
                        "entity_id" => $entityMunicipality, // entity id 3 = municipality
                        "city_id" => $municipality_id, 
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
