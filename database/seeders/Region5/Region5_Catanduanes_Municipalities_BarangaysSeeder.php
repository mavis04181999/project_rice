<?php

namespace Database\Seeders\Region5;

use App\Models\Barangay;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Region5_Catanduanes_Municipalities_BarangaysSeeder extends Seeder
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

        // Camarines Norte
        $csvFile[0] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Bagamanoc_Barangay.csv"), "r");
        $csvFile[1] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Baras_Barangay.csv"), "r");
        $csvFile[2] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Bato_Barangay.csv"), "r");
        $csvFile[3] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Caramoran_Barangay.csv"), "r");
        $csvFile[4] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Gigmoto_Barangay.csv"), "r");
        $csvFile[5] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Pandan_Barangay.csv"), "r");
        $csvFile[6] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Panganiban_Barangay.csv"), "r");
        $csvFile[7] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_SanAndres_Barangay.csv"), "r");
        $csvFile[8] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_SanMiguel_Barangay.csv"), "r");
        $csvFile[9] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Viga_Barangay.csv"), "r");
        $csvFile[10] = fopen(base_path("database/data/Province_Catanduanes_Municipalities/Catanduanes_Virac_Barangay.csv"), "r");

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
