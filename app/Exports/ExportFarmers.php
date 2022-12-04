<?php

namespace App\Exports;

use App\Models\Barangay;
use App\Models\City;
use App\Models\Farm;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Models\PickListItem;
use App\Models\Province;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportFarmers implements FromArray, WithHeadings
{
    use Exportable;

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
            'Source of Irrigation Specify - (Salt Water Intrusion Ecosystem)',
            'Is the water from this source Salt Free? - (Salt Water Intrusion Ecosystem)',
            'Indicator of Salinity',
            'Indicator of Salinity Others',

            'How frequent does Drought occurs for the past 5 years',

            'What month/s during Dry Season? - Occurence of Drought',
            'Remarks (Occurence of Drought during Dry Season)',
            'What month/s during Wet Season? - Occurence of Drought',
            'Remarks (Occurence of Drought during Wet Season)',

            'Source of Irrigation - (Drought Ecosystem)',
            'Source of Irrigation Specify - (Drought Ecosystem)',
            'Is the water from this source Salt Free? - (Drought Ecosystem)',
            'Indicator of Drought',
            'Indicator of Drought Others',
        ];
    }

    public function getUserLastName(int $id) : string
    {
        $user = User::findOrFail($id);

        return strval($user->lastName);
    }

    public function getUserPhoneNumber(int $id) : string
    {
        $user = User::findOrFail($id);

        return strval($user->phoneNumber);
    }

    public function getPickListItemVal(int $id) : string
    {
        $item = PickListItem::findOrFail($id);
        
        return strval($item->Picklistitem) ?? null;
    }

    public function getProvinceVal(int $id) : string
    {
        $province = Province::findOrFail($id);

        return strval($province->province);
    }

    public function getCityVal(int $id) : string
    {
        $city = City::findOrFail($id);
        return strval($city->city);
    }

    public function getMunicipalityVal(int $id) : string
    {
        $municipality = Municipality::findOrFail($id);
        return strval($municipality->municipality);
    }

    public function getBarangayVal(int $id) : string
    {
        $barangay = Barangay::findOrFail($id);
        return strval($barangay->barangay);
    }


    public function append_string(string $str, string $append) : string
    {
        return $str .= $append;
    }

    public function getStressEcosystemVal(array $value): string
    {
        $str = "";

        if (in_array(0, $value)) {
            $str = $this->append_string($str, "Flooded/Submerged,");
        }

        if (in_array(1, $value)) {
            $str = $this->append_string($str, "Saline,");
        }

        if (in_array(2, $value)) {
            $str = $this->append_string($str, "Drought");
        }

        return $str;
    }

    // $optionsCivilStatus = PickListItem::CivilStatus()->get();
    // $optionsEducation = PickListItem::Education()->get();
    // $optionsFrequency = PickListItem::Frequency()->get();
    // $optionsIndicatorOfDrought = PickListItem::IndicatorOfDrought()->get();
    // $optionsIndicatorOfSalinity = PickListItem::IndicatorOfSalinity()->get();
    // $optionsLandTenurialStatus = PickListItem::LandTenurialStatus()->get();
    // $optionsMonth = PickListItem::Months()->get();
    // $optionsSourceOfFloods = PickListItem::SourceOfFloods()->get();
    // $optionsSourceOfIrrigation = PickListItem::SourceOfIrrigation()->get();
    // $optionsSourceOfSalinity = PickListItem::SourceOfSalinity()->get();

    public function getPage3SourceVal(array $value): string
    {
        $str = "";

        foreach ($value as $item) {

            $str = $this->append_string($str, $this->getPickListItemVal($item).",");

        }

        return $str;
    }

    public function getPage3FrequencyVal(array $value): string
    {
        $str = "";

        foreach ($value as $item) {

            $str = $this->append_string($str, $this->getPickListItemVal($item).",");

        }

        return $str;
    }

    public function getFarmExtendedPickListItemVal(array $value): string
    {
        $str = "";

        foreach ($value as $item) {

            $str = $this->append_string($str, $this->getPickListItemVal($item).",");

        }

        return $str;
    }

    public function getSourceOfIrrigationSaltFreeVal(array $value): string
    {
        
        
        $str = "";

        foreach ($value as $key => $item) {

            $str = $this->append_string($str, $this->getPickListItemVal($key).": ".($item == 1 ? "True" : "False").",");

        }

        return $str;
    }


    public function array():array
    {
        // get all farmers where not deleted 
        $farmers = Farmer::where('deleted_at', null)->pluck('id')->toArray();

        // get all farms from farmers
        $farms = Farm::whereIn('farmer_id', $farmers)->get();

        foreach ($farms as $key => $farm) {

            $output[$key] = [
                // farmer information
                $farm->farmer->controlNumber,
                $farm->farmer->lastName,
                $farm->farmer->firstName,
                $farm->farmer->middleName,
                $farm->farmer->suffixName,
                $farm->farmer->sex,
                $farm->farmer->dateOfBirth,
                $farm->farmer->age,
                $farm->farmer->phoneNumber,
                $farm->farmer->country,
                $farm->farmer->streetAddress,
                empty($farm->farmer->province_id) ? ' - ' : $this->getProvinceVal($farm->farmer->province_id),
                empty($farm->farmer->city_id) ? ' - ' : $this->getCityVal($farm->farmer->city_id),
                empty($farm->farmer->municipality_id) ? ' - ' : $this->getMunicipalityVal($farm->farmer->municipality_id),
                empty($farm->farmer->barangay_id) ? ' - ' : $this->getBarangayVal($farm->farmer->barangay_id),
                empty($farm->farmer->civilStatus_id) ? ' - ' : $this->getPickListItemVal($farm->farmer->civilStatus_id),
                $farm->farmer->civilStatus_specify,
                empty($farm->farmer->education_id) ? ' - ' : $this->getPickListItemVal($farm->farmer->education_id),
                $farm->farmer->education_specify,
                $farm->farmer->rsbsaReg,
                $farm->farmer->rsbsaMembership,
                $farm->farmer->sourceOfIncome,
                $farm->farmer->farmingExperience,
                strval($farm->farmer->initdt),
                strval($farm->farmer->upddt),
                $this->getUserLastName($farm->farmer->initid),
                $this->getUserPhoneNumber($farm->farmer->initid),

                //farm information
                $farm->country,
                $farm->streetAddress,
                empty($farm->province_id) ? ' - ' : $this->getProvinceVal($farm->province_id),
                empty($farm->city_id) ? ' - ' : $this->getCityVal($farm->city_id),
                empty($farm->municipality_id) ? ' - ' : $this->getMunicipalityVal($farm->municipality_id),
                empty($farm->barangay_id) ? ' - ' : $this->getBarangayVal($farm->farmer->barangay_id),
                empty($farm->landTenurialStatus_id) ? ' - ' : $this->getPickListItemVal($farm->landTenurialStatus_id),
                $farm->landTenurialStatus_specify,
                $farm->totalRiceArea,
                $farm->totalStressArea,

                $farm->pp_ds_unc_question1,
                $farm->pp_ds_unc_question2,
                $farm->pp_ds_unc_question3,
                $farm->pp_ds_unc_question4,

                $farm->pp_ds_usc_question1,
                $farm->pp_ds_usc_question2,
                $farm->pp_ds_usc_question3,
                $farm->pp_ds_usc_question4,

                $farm->pp_ws_unc_question1,
                $farm->pp_ws_unc_question2,
                $farm->pp_ws_unc_question3,
                $farm->pp_ws_unc_question4,

                $farm->pp_ws_usc_question1,
                $farm->pp_ws_usc_question2,
                $farm->pp_ws_usc_question3,
                $farm->pp_ws_usc_question4,

                $farm->ecosystem,
                empty($farm->stressEcosystem) ? ' - ' : $this->getStressEcosystemVal($farm->stressEcosystem),

                // farm extended
                empty($farm->farm_extended->page3_source_id) ? ' - ' : $this->getPage3SourceVal($farm->farm_extended->page3_source_id),
                $farm->farm_extended->page3_source_specify,
                empty($farm->farm_extended->page3_frequency) ? ' - ' : $this->getPage3FrequencyVal($farm->farm_extended->page3_frequency),
                $farm->farm_extended->page3_flashflood_waterlevel,
                $farm->farm_extended->page3_flashflood_days,
                $farm->farm_extended->page3_flashflood_hours,

                $farm->farm_extended->page3_intermittent_waterlevel,
                $farm->farm_extended->page3_intermittent_days,
                $farm->farm_extended->page3_intermittent_hours,

                $farm->farm_extended->page3_stagnant_waterlevel,
                $farm->farm_extended->page3_stagnant_days,
                $farm->farm_extended->page3_stagnant_hours,

                $farm->farm_extended->page3_all_waterlevel,
                $farm->farm_extended->page3_all_days,
                $farm->farm_extended->page3_all_hours,

                empty($farm->farm_extended->page3_occurenceofflood_ds_months) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page3_occurenceofflood_ds_months),
                $farm->farm_extended->page3_occurenceofflood_ds_remarks,
                empty($farm->farm_extended->page3_occurenceofflood_ws_months) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page3_occurenceofflood_ws_months),
                $farm->farm_extended->page3_occurenceofflood_ws_remarks,

                empty($farm->farm_extended->page4_source_id) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page4_source_id),
                $farm->farm_extended->page4_source_specify,
                empty($farm->farm_extended->page4_frequency) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page4_frequency),

                empty($farm->farm_extended->page4_occurenceofsalinity_ds_months) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page4_occurenceofsalinity_ds_months),
                $farm->farm_extended->page4_occurenceofsalinity_ds_remarks,
                empty($farm->farm_extended->page4_occurenceofsalinity_ws_months) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page4_occurenceofsalinity_ws_months),
                $farm->farm_extended->page4_occurenceofsalinity_ws_remarks,

                empty($farm->farm_extended->page4_checkbox_sourceOfIrrigation) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page4_checkbox_sourceOfIrrigation),
                $farm->farm_extended->page4_sourceOfIrrigation_specify,
                empty($farm->farm_extended->page4_sourceOfIrrigation_saltfree) ? ' - ' : $this->getSourceOfIrrigationSaltFreeVal($farm->farm_extended->page4_sourceOfIrrigation_saltfree),
                empty($farm->farm_extended->page4_indicatorofsalinity) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page4_indicatorofsalinity),
                $farm->farm_extended->page4_indicatorofsalinity_specify,

                empty($farm->farm_extended->page5_frequency) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page5_frequency),
                empty($farm->farm_extended->page5_occurenceofdrought_ds_months) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page5_occurenceofdrought_ds_months),
                $farm->farm_extended->page5_occurenceofdrought_ds_remarks,
                empty($farm->farm_extended->page5_occurenceofdrought_ws_months) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page5_occurenceofdrought_ws_months),
                $farm->farm_extended->page5_occurenceofdrought_ws_remarks,

                empty($farm->farm_extended->page5_checkbox_sourceOfIrrigation) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page5_checkbox_sourceOfIrrigation),
                $farm->farm_extended->page5_sourceOfIrrigation_specify,
                empty($farm->farm_extended->page5_sourceOfIrrigation_saltfree) ? ' - ' : $this->getSourceOfIrrigationSaltFreeVal($farm->farm_extended->page5_sourceOfIrrigation_saltfree),
                empty($farm->farm_extended->page5_indicatorofdrought) ? ' - ' : $this->getFarmExtendedPickListItemVal($farm->farm_extended->page5_indicatorofdrought),
                $farm->farm_extended->page5_indicatorofdrought_specify

            ];
        }

        return $output;
    }
}
