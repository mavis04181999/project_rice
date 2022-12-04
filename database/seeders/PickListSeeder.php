<?php

namespace Database\Seeders;

use App\Models\PickList;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // PickList::truncate();

        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $csvFile = fopen(base_path("database/data/picklist.csv"), "r");

        $firstline = true;
        while(($data = fgetcsv($csvFile, 2000, ",")) !== false)
        {
            if(!$firstline)
            {
                $picklist[] = [
                    "Picklist" => utf8_encode($data['0']),
                    "initdt" => Carbon::now(),
                    "upddt" => Carbon::now(),
                    "initid" => 1,
                    "updid" => 1,  
                ];


                // PickList::create([
                //     "Picklist" => utf8_encode($data['0']),
                //     "initdt" => Carbon::now(),
                //     "upddt" => Carbon::now(),
                //     "initid" => 1,
                //     "updid" => 1,
                // ]);
            }
            $firstline = false;
        }

        fclose($csvFile);

        foreach(array_chunk($picklist, 1000) as $chunk)
        {
            PickList::insert($chunk);
        }
    }


}
