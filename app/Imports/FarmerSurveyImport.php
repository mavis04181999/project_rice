<?php

namespace App\Imports;

use App\Models\Farmer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FarmerSurveyImport implements ToModel, WithHeadingRow
{
    
    public function __construct($user_id)
    {
        $this->$user_id = $user_id;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        dd($row);
        
        return new Farmer([
            //
        ]);
    }
}
