<?php

namespace Database\Seeders;

use Database\Seeders\Region5\Region5_Albay_Cities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_Albay_Municipalities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_CamarinesNorte_Municipalities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_CamarinesSur_Cities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_CamarinesSur_Municipalities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_Catanduanes_Municipalities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_CitiesSeeder;
use Database\Seeders\Region5\Region5_Masbate_Cities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_Masbate_Municipalities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_MunicipalitiesSeeder;
use Database\Seeders\Region5\Region5_ProvincesSeeder;
use Database\Seeders\Region5\Region5_Sorsogon_Cities_BarangaysSeeder;
use Database\Seeders\Region5\Region5_Sorsogon_Municipalities_BarangaysSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminUserSeeder::class,
            EnumeratorUserSeeder::class,

            EntitySeeder::class,
            PickListSeeder::class,
            PickListItemSeeder::class,

            Region5_ProvincesSeeder::class,
            Region5_CitiesSeeder::class,
            Region5_MunicipalitiesSeeder::class,            
            Region5_Albay_Cities_BarangaysSeeder::class,
            Region5_Albay_Municipalities_BarangaysSeeder::class,
            Region5_CamarinesNorte_Municipalities_BarangaysSeeder::class,
            Region5_CamarinesSur_Cities_BarangaysSeeder::class,
            Region5_CamarinesSur_Municipalities_BarangaysSeeder::class,
            Region5_Catanduanes_Municipalities_BarangaysSeeder::class,
            Region5_Masbate_Cities_BarangaysSeeder::class,
            Region5_Masbate_Municipalities_BarangaysSeeder::class,
            Region5_Sorsogon_Cities_BarangaysSeeder::class,
            Region5_Sorsogon_Municipalities_BarangaysSeeder::class,
            
        ]);
    }
}
