<?php

namespace Database\Seeders\Region5;

use App\Models\Barangay;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Region5_CamarinesSur_Municipalities_BarangaysSeeder extends Seeder
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
        $csvFile[0] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Baao_Barangay.csv"), "r");
        $csvFile[1] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Balatan_Barangay.csv"), "r");
        $csvFile[2] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Bato_Barangay.csv"), "r");
        $csvFile[3] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Bombon_Barangay.csv"), "r");
        $csvFile[4] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Buhi_Barangay.csv"), "r");
        $csvFile[5] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Bula_Barangay.csv"), "r");
        $csvFile[6] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Cabusao_Barangay.csv"), "r");
        $csvFile[7] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Calabanga_Barangay.csv"), "r");
        $csvFile[8] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Camaligan_Barangay.csv"), "r");
        $csvFile[9] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Canaman_Barangay.csv"), "r");
        $csvFile[10] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Caramoan_Barangay.csv"), "r");

        $csvFile[11] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_DelGallego_Barangay.csv"), "r");
        $csvFile[12] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Gainza_Barangay.csv"), "r");
        $csvFile[13] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Garchitorena_Barangay.csv"), "r");
        $csvFile[14] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Goa_Barangay.csv"), "r");
        $csvFile[15] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Lagonoy_Barangay.csv"), "r");
        $csvFile[16] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Libmanan_Barangay.csv"), "r");
        $csvFile[17] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Lupi_Barangay.csv"), "r");
        $csvFile[18] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Magarao_Barangay.csv"), "r");
        $csvFile[19] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Milaor_Barangay.csv"), "r");
        $csvFile[20] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Minalabac_Barangay.csv"), "r");
        $csvFile[21] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Nabua_Barangay.csv"), "r");
        
        $csvFile[22] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Ocampo_Barangay.csv"), "r");
        $csvFile[23] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Pamplona_Barangay.csv"), "r");
        $csvFile[24] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Pasacao_Barangay.csv"), "r");
        $csvFile[25] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Pili_Barangay.csv"), "r");
        $csvFile[26] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Presentacion_Barangay.csv"), "r");
        $csvFile[27] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Ragay._Barangay.csv"), "r");
        $csvFile[28] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Sagnay_Barangay.csv"), "r");
        $csvFile[29] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_SanFernando_Barangay.csv"), "r");
        $csvFile[30] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_SanJose_Barangay.csv"), "r");
        $csvFile[31] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Sipocot_Barangay.csv"), "r");
        $csvFile[32] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Siruma_Barangay.csv"), "r");
        
        $csvFile[33] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Tigaon_Barangay.csv"), "r");
        $csvFile[34] = fopen(base_path("database/data/Province_CamarinesSur_Municipalities/CamarinesSur_Tinambac_Barangay.csv"), "r");

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
