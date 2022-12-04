<?php

namespace App\Exports;

use App\Models\Farm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportFarms implements FromQuery, WithHeadings
{
    
    public function headings(): array
    {
        return [
            // Farmer Table
            'Control Number',
            'Last Name',
            'First Name',
            'Middle Name',
            'Suffix Name',
            'Sex',
            'Date of Birth',
            'Age',
            'Phone Number',
            'Country',
            'Street Address',
            'Province',
            'City',
            'Municipality',
            'Barangay',
            'Civil Status',
            'Civil Status Specify',
            'Education',
            'Education Specify',
            'RSBSA Registration',
            'RSBSA Membership',
            'Source of Income [Job]',
            'Farming Experience',
            'Date Created',
            'Date Modified',
            'Enumerator Name',
            'Enumerator Contact Number',

            // Farm Table
            'Country',
            'Street Address',
            'Province',
            'City',
            'Municipality',
            'Barangay',
            'Land Tenurial Status',
            'Land Tenurial Status Specify',
            'Total Rice Area',
            'Total Stress Area',

            'Average Yield based on Actual Area(Bag/Ha) - Production of Palay under Normal Condition during Dry Season',
            'Average Yield of Palay (Kg/Bag) - Production of Palay under Normal Condition during Dry Season',
            'Production Cost (PHP 0.00) - Production of Palay under Normal Condition during Dry Season',
            'Price of Palay per Kg (PHP 0.00) - Production of Palay under Normal Condition during Dry Season',

            'Average Yield based on Actual Area(Bag/Ha) - Production of Palay under Stress Condition during Dry Season',
            'Average Yield of Palay (Kg/Bag) - Production of Palay under Stress Condition during Dry Season',
            'Production Cost (PHP 0.00) - Production of Palay under Stress Condition during Dry Season',
            'Price of Palay per Kg (PHP 0.00) - Production of Palay under Stress Condition during Dry Season',

            'Average Yield based on Actual Area(Bag/Ha) - Production of Palay under Normal Condition during Wet Season',
            'Average Yield of Palay (Kg/Bag) - Production of Palay under Normal Condition during Wet Season',
            'Production Cost (PHP 0.00) - Production of Palay under Normal Condition during Wet Season',
            'Price of Palay per Kg (PHP 0.00) - Production of Palay under Normal Condition during Wet Season',

            'Average Yield based on Actual Area(Bag/Ha) - Production of Palay under Stress Condition during Wet Season',
            'Average Yield of Palay (Kg/Bag) - Production of Palay under Stress Condition during Wet Season',
            'Production Cost (PHP 0.00) - Production of Palay under Stress Condition during Wet Season',
            'Price of Palay per Kg (PHP 0.00) - Production of Palay under Stress Condition during Wet Season',

            'Ecosystem',
            'Stress Ecosystem',

            // Farm Extended
            'Source/ Cause of Floods',
            'Source/ Cause of Floods Others',
            'How frequent does flooding occurs for the past 5 years',

            'Water Level (cm) - Flashflood',
            'Duration (No. of Days) - Flashflood',
            'Duration (No. of Hours) - Flashflood',

            'Water Level (cm) - Intermittent',
            'Duration (No. of Days) - Intermittent',
            'Duration (No. of Hours) - Intermittent',

            'Water Level (cm) - Stagnant',
            'Duration (No. of Days) - Stagnant',
            'Duration (No. of Hours) - Stagnant',

            'Water Level (cm) - All of the Above',
            'Duration (No. of Days) - All of the Above',
            'Duration (No. of Hours) - All of the Above',

            'What month/s during Dry Season? - Occurence of Flood',
            'Remarks (Occurence of Flood during Dry Season)',
            'What month/s during Wet Season? - Occurence of Flood',
            'Remarks (Occurence of Flood during Wet Season)',

            'Source/Cause of Salinity',
            'Source/Cause of Salinity Others',
            'How frequent does salt water intrusion occurs for the past 5 years',

            'What month/s during Dry Season? - Occurence of Salinity',
            'Remarks (Occurence of Salinity during Dry Season)',
            'What month/s during Wet Season? - Occurence of Salinity',
            'Remarks (Occurence of Salinity during Wet Season)',

            'Source of Irrigation - (Salt Water Intrusion Ecosystem)',
            'Is the water from this source Salt Free? - (Salt Water Intrusion Ecosystem)',
            'Indicator of Salinity',

            'How frequent does Drought occurs for the past 5 years',

            'What month/s during Dry Season? - Occurence of Drought',
            'Remarks (Occurence of Drought during Dry Season)',
            'What month/s during Wet Season? - Occurence of Drought',
            'Remarks (Occurence of Drought during Wet Season)',

            'Source of Irrigation - (Drought Ecosystem)',
            'Is the water from this source Salt Free? - (Drought Ecosystem)',
            'Indicator of Drought',

            

        
            

            
        ];
    }

    public function query()
    {
        return Farm::where('deleted_at', null)
                ->leftjoin('provinces', 'farmers.province_id', '=', 'provinces.id')
                ->leftjoin('cities', 'farmers.city_id', '=', 'cities.id')
                ->leftjoin('municipalities', 'farmers.municipality_id', '=', 'municipalities.id')
                ->leftjoin('barangay', 'farmers.barangay_id', '=', 'barangay.id')
                ->leftjoin('picklistitem as civilstatus', 'farmers.civilStatus_id', '=', 'civilstatus.id')
                ->leftjoin('picklistitem as education', 'farmers.education_id', '=', 'education.id')
        ;
    }
}



