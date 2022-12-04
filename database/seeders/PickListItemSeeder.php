<?php

namespace Database\Seeders;

use App\Models\PickListItem;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PickListItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = [];
        $pickList = [];

        $csvFile[0] = fopen(base_path("database/data/picklistitem_civilstatus.csv"), "r");
        $csvFile[1] = fopen(base_path("database/data/picklistitem_education.csv"), "r");
        $csvFile[2] = fopen(base_path("database/data/picklistitem_frequency.csv"), "r");
        $csvFile[3] = fopen(base_path("database/data/picklistitem_indicatorofdrought.csv"), "r");
        $csvFile[4] = fopen(base_path("database/data/picklistitem_indicatorofsalinity.csv"), "r");
        $csvFile[5] = fopen(base_path("database/data/picklistitem_landtenurialstatus.csv"), "r");
        $csvFile[6] = fopen(base_path("database/data/picklistitem_months.csv"), "r");
        $csvFile[7] = fopen(base_path("database/data/picklistitem_sourceofflood.csv"), "r");
        $csvFile[8] = fopen(base_path("database/data/picklistitem_sourceofirrigation.csv"), "r");
        $csvFile[9] = fopen(base_path("database/data/picklistitem_sourceofsalinity.csv"), "r");

        $pickList[0] = DB::table('picklist')->where('Picklist', utf8_encode('Civil Status'))->value('id');
        $pickList[1] = DB::table('picklist')->where('Picklist', utf8_encode('Education'))->value('id');
        $pickList[2] = DB::table('picklist')->where('Picklist', utf8_encode('Frequency'))->value('id');
        $pickList[3] = DB::table('picklist')->where('Picklist', utf8_encode('Indicator of Drought'))->value('id');
        $pickList[4] = DB::table('picklist')->where('Picklist', utf8_encode('Indicator of Salinity'))->value('id');
        $pickList[5] = DB::table('picklist')->where('Picklist', utf8_encode('Land Tenurial Status'))->value('id');
        $pickList[6] = DB::table('picklist')->where('Picklist', utf8_encode('Months'))->value('id');
        $pickList[7] = DB::table('picklist')->where('Picklist', utf8_encode('Source of Floods'))->value('id');
        $pickList[8] = DB::table('picklist')->where('Picklist', utf8_encode('Source of Irrigation'))->value('id');
        $pickList[9] = DB::table('picklist')->where('Picklist', utf8_encode('Source of Salinity'))->value('id');

        for ($i=0; $i < count($csvFile); $i++) {
            
            $firstline = true;
            $position = 1;

            while(($data = fgetcsv($csvFile[$i], 2000, ",")) !== false)
            {
                if(!$firstline)
                {

                    $picklistitems[] = [
                        "pick_list_id" => $pickList[$i],
                        "Picklistitem" => utf8_encode($data['0']),
                        "position" => $position,
                        "initdt" => Carbon::now(),
                        "upddt" => Carbon::now(),
                        "initid" => 1,
                        "updid" => 1,
                    ];

                    // PickListItem::create([
                    //     "pick_list_id" => $pickList[$i],
                    //     "Picklistitem" => utf8_encode($data['0']),
                    //     "position" => $position,
                    //     "initdt" => Carbon::now(),
                    //     "upddt" => Carbon::now(),
                    //     "initid" => 1,
                    //     "updid" => 1,
                    // ]);

                    $position++;
                }
                $firstline = false;
    
            }
    
            fclose($csvFile[$i]);
        }

        foreach(array_chunk($picklistitems, 1000) as $chunk)
        {
            PickListItem::insert($chunk);
        }

    }
}
