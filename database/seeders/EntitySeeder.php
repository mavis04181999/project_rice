<?php

namespace Database\Seeders;

use App\Models\Entity;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("database/data/entity.csv"), "r");

        $firstline = true;
        while(($data = fgetcsv($csvFile, 2000, ",")) !== false)
        {
            if(!$firstline)
            {
                Entity::create([
                    "Entity" => utf8_encode($data['0']),
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
