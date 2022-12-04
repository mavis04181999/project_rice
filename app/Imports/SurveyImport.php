<?php

namespace App\Imports;

use App\Models\Barangay;
use App\Models\City;
use App\Models\Farm;
use App\Models\Farm_Extended;
use App\Models\Farmer;
use App\Models\Municipality;
use App\Models\PickListItem;
use App\Models\Province;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithValidation;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class SurveyImport implements ToCollection, WithHeadingRow, WithBatchInserts, WithChunkReading, WithValidation
{
    public function __construct($user_id)
    {
        $this->user_id = $user_id;

        $this->provinces = Province::latest()->get();
        $this->cities = City::latest()->get();
        $this->municipalities = Municipality::latest()->get();
        $this->barangays = Barangay::latest()->get();
        
        $this->optionsCivilStatus = PickListItem::CivilStatus()->get();
        $this->optionsEducation = PickListItem::Education()->get();
        $this->optionsFrequency = PickListItem::Frequency()->get();
        $this->optionsIndicatorOfDrought = PickListItem::IndicatorOfDrought()->get();
        $this->optionsIndicatorOfSalinity = PickListItem::IndicatorOfSalinity()->get();
        $this->optionsLandTenurialStatus = PickListItem::LandTenurialStatus()->get();
        $this->optionsMonth = PickListItem::Months()->get();
        $this->optionsSourceOfFloods = PickListItem::SourceOfFloods()->get();
        $this->optionsSourceOfIrrigation = PickListItem::SourceOfIrrigation()->get();
        $this->optionsSourceOfSalinity = PickListItem::SourceOfSalinity()->get();
    }
    
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {

            $farmer = Farmer::create([
                'controlNumber' => $row['controlnumber'],
                'lastName' => $row['farmer_last_name'],
                'firstName' => $row['farmer_first_name'],
                'middleName' => $row['farmer_middle_name'],
                'suffixName' => $row['farmer_suffix_name'],
                'sex' => $row['farmer_sex'],
                'dateOfBirth' => Date::excelToDateTimeObject($row['farmer_birthdate'])->format('Y-m-d'),
                'age' => $row['farmer_age'],
                'phoneNumber' => is_null($row['farmer_contact_number']) ? NULL : $this->formatContactNumber($row['farmer_contact_number']),

                'country' => $row['farmer_country'],
                'streetAddress' => $row['farmer_street_address'],
                'province_id' => is_null($row['farmer_province']) ? NULL : $this->getProvinceVal($row['farmer_province']),
                'city_id' => is_null($row['farmer_city']) ? NULL : $this->getCityVal($row['farmer_city']),
                'municipality_id' => is_null($row['farmer_municipality']) ? NULL : $this->getMunicipalityVal($row['farmer_municipality']),
                'barangay_id' => is_null($row['farmer_barangay']) ? NULL : $this->getBarangayVal($row['farmer_barangay']),
                
                'civilStatus_id' => is_null($row['farmer_civil_status']) ? NULL : $this->getCivilStatusVal($row['farmer_civil_status']),
                'civilStatus_specify' => $row['farmer_civil_status_specify'],
                'education_id' => is_null($row['farmer_educational_attainment']) ? NULL : $this->getEducationalAttainmentVal($row['farmer_educational_attainment']),
                'education_specify' => $row['farmer_educational_attainment_specify'],
                'rsbsaReg' => is_null($row['farmer_rsbsa_registration_status']) ? NULL : $this->getRegistrationStatusVal($row['farmer_rsbsa_registration_status']),

                'rsbsaMembership' => $row['farmer_membership_in_farmers_organizationassocation'],
                'sourceOfIncome' => $row['farmer_source_of_income'],
                'farmingExperience' => $row['farmer_farming_experience'],

                'initdt' => Date::excelToDateTimeObject($row['date_interview'])->format('Y-m-d'),
                'upddt' => Date::excelToDateTimeObject($row['date_interview'])->format('Y-m-d'),
                'initid' => $this->user_id,
                'updid' => $this->user_id,
            ]);

            $farm = Farm::create([
                'farmer_id' => $farmer->id,

                'country' => $row['farm_country'],
                'streetAddress' => $row['farm_street_address'],
                'province_id' => is_null($row['farm_province']) ? NULL : $this->getProvinceVal($row['farm_province']),
                'city_id' => is_null($row['farm_city']) ? NULL : $this->getCityVal($row['farm_city']),
                'municipality_id' => is_null($row['farm_municipality']) ? NULL : $this->getMunicipalityVal($row['farm_municipality']),
                'barangay_id' => is_null($row['farm_barangay']) ? NULL : $this->getBarangayVal($row['farm_barangay']),

                'landTenurialStatus_id' => is_null($row['land_tenurial_status']) ? NULL : $this->getPickListItemVal($row['land_tenurial_status']), 
                'landTenurialStatus_specify' => $row['land_tenurial_status_specify'],

                'totalRiceArea' => $row['total_rice_area'], 
                'totalStressArea' => $row['total_stress_area'], 

                'pp_ds_unc_question1' => $row['average_yield_under_normal_condition_dry_season'], 
                'pp_ds_unc_question2' => $row['kg_or_bag_of_palay_under_normal_condition_dry_season'], 
                'pp_ds_unc_question3' => $row['price_of_palay_per_kg_under_normal_condition_dry_season'], 
                'pp_ds_unc_question4' => $row['production_cost_under_normal_condition_dry_season'], 
                
                'pp_ds_usc_question1' => $row['average_yield_under_stress_condition_dry_season'], 
                'pp_ds_usc_question2' => $row['kg_or_bag_of_palay_under_stress_condition_dry_season'], 
                'pp_ds_usc_question3' => $row['price_of_palay_per_kg_under_stress_condition_dry_season'], 
                'pp_ds_usc_question4' => $row['production_cost_under_stress_condition_dry_season'], 

                'pp_ws_unc_question1' => $row['average_yield_under_normal_condition_wet_season'], 
                'pp_ws_unc_question2' => $row['kg_or_bag_of_palay_under_normal_condition_wet_season'], 
                'pp_ws_unc_question3' => $row['price_of_palay_per_kg_under_normal_condition_wet_season'], 
                'pp_ws_unc_question4' => $row['production_cost_under_normal_condition_wet_season'], 

                'pp_ws_usc_question1' => $row['average_yield_under_stress_condition_wet_season'], 
                'pp_ws_usc_question2' => $row['kg_or_bag_of_palay_under_stress_condition_wet_season'], 
                'pp_ws_usc_question3' => $row['price_of_palay_per_kg_under_stress_condition_wet_season'], 
                'pp_ws_usc_question4' => $row['production_cost_under_stress_condition_wet_season'], 

                'ecosystem' => $row['ecosystem'], 
                'stressEcosystem' => is_null($row['stress_ecosystem']) ? NULL : $this->getStressEcosystemVal($row['stress_ecosystem']), 

                'initdt' => Date::excelToDateTimeObject($row['date_interview'])->format('Y-m-d'),
                'upddt' => Date::excelToDateTimeObject($row['date_interview'])->format('Y-m-d'),
                'initid' => $this->user_id,
                'updid' => $this->user_id,
            ]);

            $farm_extended = Farm_Extended::create([
                'farm_id' => $farm->id,

                'page3_source_id' => is_null($row['source_or_cause_of_floods']) ? NULL : $this->getSourcesOfFloodVal($row['source_or_cause_of_floods']),
                'page3_source_specify' => $row['source_or_cause_of_floods_others'],
                'page3_frequency' => is_null($row['frequency_of_flood']) ? NULL : $this->getFrequencyVal($row['frequency_of_flood']),

                'page3_flashflood_waterlevel' => is_null($row['flashflood_water_level_cm']) ? NULL : $row['flashflood_water_level_cm'],
                'page3_flashflood_days' => is_null($row['flashflood_durationnumber_of_days']) ? NULL : $row['flashflood_durationnumber_of_days'],
                'page3_flashflood_hours' => is_null($row['flashflood_durationnumber_of_hours']) ? NULL : $row['flashflood_durationnumber_of_hours'],

                'page3_intermittent_waterlevel' => is_null($row['intermittent_water_level_cm']) ? NULL : $row['intermittent_water_level_cm'],
                'page3_intermittent_days' => is_null($row['intermittent_durationnumber_of_days']) ? NULL : $row['intermittent_durationnumber_of_days'],
                'page3_intermittent_hours' => is_null($row['intermittent_durationnumber_of_hours']) ? NULL : $row['intermittent_durationnumber_of_hours'],

                'page3_stagnant_waterlevel' => is_null($row['stagnant_water_level_cm']) ? NULL : $row['stagnant_water_level_cm'],
                'page3_stagnant_days' => is_null($row['stagnant_durationnumber_of_days']) ? NULL : $row['stagnant_durationnumber_of_days'],
                'page3_stagnant_hours' => is_null($row['stagnant_durationnumber_of_hours']) ? NULL : $row['stagnant_durationnumber_of_hours'],

                'page3_all_waterlevel' => is_null($row['all_of_the_above_water_level_cm']) ? NULL : $row['all_of_the_above_water_level_cm'],
                'page3_all_days' => is_null($row['all_of_the_above_durationnumber_of_days']) ? NULL : $row['all_of_the_above_durationnumber_of_days'],
                'page3_all_hours' => is_null($row['all_of_the_above_durationnumber_of_hours']) ? NULL : $row['all_of_the_above_durationnumber_of_hours'],

                'page3_occurenceofflood_ds_months' => is_null($row['occurrence_of_flood_during_dry_season_months']) ? NULL : $this->getMonthsVal($row['occurrence_of_flood_during_dry_season_months']),
                'page3_occurenceofflood_ds_remarks' => $row['occurrence_of_flood_during_dry_season_remarks'],
                'page3_occurenceofflood_ws_months' => is_null($row['occurrence_of_flood_during_wet_season_months']) ? NULL : $this->getMonthsVal($row['occurrence_of_flood_during_wet_season_months']),
                'page3_occurenceofflood_ws_remarks' => $row['occurrence_of_flood_during_wet_season_remarks'],

                'page4_source_id' => is_null($row['source_or_cause_of_salinity']) ? NULL : $this->getSourceOfSalinity($row['source_or_cause_of_salinity']),
                'page4_source_specify' =>  $row['source_or_cause_of_salinity_others'],
                'page4_frequency' => is_null($row['frequency_of_salt_water_intrusion']) ? NULL : $this->getFrequencyVal($row['frequency_of_salt_water_intrusion']),

                'page4_occurenceofsalinity_ds_months' => is_null($row['occurrence_of_salinity_during_dry_season_months']) ? NULL : $this->getMonthsVal($row['occurrence_of_salinity_during_dry_season_months']),
                
                'page4_occurenceofsalinity_ds_remarks' => $row['occurrence_of_salinity_during_dry_season_remarks'],
                'page4_occurenceofsalinity_ws_months' => is_null($row['occurrence_of_salinity_during_wet_season_months']) ? NULL : $this->getMonthsVal($row['occurrence_of_salinity_during_wet_season_months']),
                'page4_occurenceofsalinity_ws_remarks' => $row['occurrence_of_salinity_during_wet_season_remarks'],

                'page4_checkbox_sourceOfIrrigation' => is_null($row['source_of_irrigation_salt_water_intrusion_ecosystem']) ? NULL : $this->getSourceOfIrrigationVal($row['source_of_irrigation_salt_water_intrusion_ecosystem']),
                'page4_sourceOfIrrigation_specify' => $row['source_of_irrigation_specify_salt_water_intrusion_ecosystem'],
                'page4_sourceOfIrrigation_saltfree' =>  is_null($row['source_of_irrigation_salt_free_salt_water_intrusion_ecosystem']) ? NULL : $this->getSourceOfIrrigationSaltFreeVal($row['source_of_irrigation_salt_free_salt_water_intrusion_ecosystem']),
                'page4_indicatorofsalinity' => is_null($row['indicator_of_salinity']) ? NULL : $this->getIndicatorOfSalinityVal($row['indicator_of_salinity']),
                'page4_indicatorofsalinity_specify' => $row['indicator_of_salinity_others'],

                'page5_frequency' => is_null($row['frequency_of_drought']) ? NULL : $this->getFrequencyVal($row['frequency_of_drought']),
                'page5_occurenceofdrought_ds_months' => is_null($row['occurrence_of_drought_during_dry_season_months']) ? NULL : $this->getMonthsVal($row['occurrence_of_drought_during_dry_season_months']),
                'page5_occurenceofdrought_ds_remarks' => $row['occurrence_of_drought_during_dry_season_remarks'],
                'page5_occurenceofdrought_ws_months' => is_null($row['occurrence_of_drought_during_wet_season_months']) ? NULL : $this->getMonthsVal($row['occurrence_of_drought_during_wet_season_months']),
                'page5_occurenceofdrought_ws_remarks' => $row['occurrence_of_drought_during_wet_season_remarks'],

                'page5_checkbox_sourceOfIrrigation' => is_null($row['source_of_irrigation_drought_ecosystem']) ? NULL : $this->getSourceOfIrrigationVal($row['source_of_irrigation_drought_ecosystem']),
                'page5_sourceOfIrrigation_specify' => $row['source_of_irrigation_specify_drought_ecosystem'],
                'page5_sourceOfIrrigation_saltfree' => is_null($row['source_of_irrigation_salt_free_drought_ecosystem']) ? NULL : $this->getSourceOfIrrigationSaltFreeVal($row['source_of_irrigation_salt_free_drought_ecosystem']),
                'page5_indicatorofdrought' => is_null($row['indicator_of_drought']) ? NULL : $this->getIndicatorOfDroughtVal($row['indicator_of_drought']),
                'page5_indicatorofdrought_specify' => $row['indicator_of_drought_others'],

                'initdt' => Date::excelToDateTimeObject($row['date_interview'])->format('Y-m-d'),
                'upddt' => Date::excelToDateTimeObject($row['date_interview'])->format('Y-m-d'),
                'initid' => $this->user_id,
                'updid' => $this->user_id,
            ]);

        }
    }

    public function rules(): array
    {
        return [

            'farmer_first_name' => ['required'],
            'farmer_last_name' => ['required'],
            'farmer_birthdate' => ['sometimes', 'nullable', 'before:today'],
            'farmer_sex' => ['sometimes', 'nullable'],

            'farmer_country' => ['sometimes', 'nullable'],
            'farmer_street_address' => ['sometimes', 'nullable'],

            'farmer_province' => ['sometimes', 'nullable'],
            // 'farmer_city' => ['required_without:farmer_municipality'],
            // 'farmer_municipality' => ['required_without:farmer_city'],
            'farmer_barangay' => ['sometimes', 'nullable'],

            'farmer_age' => ['sometimes', 'nullable', 'numeric'], 

            // Page 2: Validation

            'farm_country' => ['sometimes', 'nullable'],
            'farm_street_address' => ['sometimes', 'nullable'],

            'farm_province' => ['sometimes', 'nullable'],
            // 'farm_city' => ['required_without:farm_municipality'],
            // 'farm_municipality' => ['required_without:farm_city'],
            'farm_barangay' => ['sometimes', 'nullable'],

            'land_tenurial_status' => ['sometimes', 'nullable'],

            'total_rice_area' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'total_stress_area' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            'average_yield_under_normal_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'kg_or_bag_of_palay_under_normal_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'price_of_palay_per_kg_under_normal_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'production_cost_under_normal_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            'average_yield_under_stress_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'kg_or_bag_of_palay_under_stress_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'price_of_palay_per_kg_under_stress_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'production_cost_under_stress_condition_dry_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            'average_yield_under_normal_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'kg_or_bag_of_palay_under_normal_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'price_of_palay_per_kg_under_normal_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'production_cost_under_normal_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            'average_yield_under_stress_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'kg_or_bag_of_palay_under_stress_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'price_of_palay_per_kg_under_stress_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'production_cost_under_stress_condition_wet_season' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            'ecosystem' => ['required'],
            'stress_ecosystem' => ['required'],

        ];
    }

    // public function messages() : array
    // {
    //     return [
    //         'farmer_first_name.required' => 'Farmer Information: First name field is required.',
    //         'farmer_last_name.required' => 'Farmer Information: Last name field is required.',
    //         'farmer_birthdate.required' => 'Farmer Information: Date of Birth field is required.',
    //         'farmer_sex.required' => 'Farmer Information: Sex field is required.',
    //         'farmer_country.required' => 'Farmer Information: Country field is required.',
    //         'farmer_street_address.required' => 'Farmer Information: Street Address field is required.',
    //         'farmer_province.required' => 'Farmer Information: Province field is required.',
    //         'farmer_city.required' => 'Farmer Information: City field is required.',
    //         'farmer_municipality.required' => 'Farmer Information: Municipality field is required.',
    //         'farmer_barangay.required' => 'Farmer Information: Barangay field is required.',

    //         // Page 2:
    //         'farm_country.required' => 'Farm Information: Country field is required.',
    //         'farm_street_address.required' => 'Farm Information: Street Address field is required.',
    //         'farm_province.required' => 'Farm Information: Province field is required.',
    //         'farm_city.required' => 'Farm Information: City field is required.',
    //         'farm_municipality.required' => 'Farm Information: Municipality field is required.',
    //         'farm_barangay.required' => 'Farm Information: Barangay field is required.',

    //         'land_tenurial_status.required' => 'Farm Information: Land Tenurial Status field is required.',
    //         'land_tenurial_status_specify.required' => 'Farm Information: Land Tenurial Status - Specify field is required.',
    //         'land_tenurial_status_specify.required_if' => 'Farm Information: Land Tenurial Status - Specify field is required.',

    //         'total_rice_area.required' => 'Farm Information: Total Rice Area field is required.',
    //         'total_stress_area.required' => 'Farm Information: Total Rice Stress Area field is required.',

    //         'average_yield_under_normal_condition_dry_season.required' => 'Farm Information: Production of Palay under Normal Condition during Dry Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
    //         'kg_or_bag_of_palay_under_normal_condition_dry_season.required' => 'Farm Information: Production of Palay under Normal Condition during Dry Season 2. Average Yield of Palay (Kg/Bag) is required.',
    //         'price_of_palay_per_kg_under_normal_condition_dry_season.required' => 'Farm Information: Production of Palay under Normal Condition during Dry Season 3. Production Cost field is required.',
    //         'production_cost_under_normal_condition_dry_season.required' => 'Farm Information: Production of Palay under Normal Condition during Dry Season 4. Price of Palay per Kg field is required.',
            
    //         'average_yield_under_stress_condition_dry_season.required' => 'Farm Information: Production of Palay under Stress Condition during Dry Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
    //         'kg_or_bag_of_palay_under_stress_condition_dry_season.required' => 'Farm Information: Production of Palay under Stress Condition during Dry Season 2. Average Yield of Palay (Kg/Bag) is required.',
    //         'price_of_palay_per_kg_under_stress_condition_dry_season.required' => 'Farm Information: Production of Palay under Stress Condition during Dry Season 3. Production Cost field is required.',
    //         'production_cost_under_stress_condition_dry_season.required' => 'Farm Information: Production of Palay under Stress Condition during Dry Season 4. Price of Palay per Kg field is required.',

    //         'average_yield_under_normal_condition_wet_season.required' => 'Farm Information: Production of Palay under Normal Condition during Wet Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
    //         'kg_or_bag_of_palay_under_normal_condition_wet_season.required' => 'Farm Information: Production of Palay under Normal Condition during Wet Season 2. Average Yield of Palay (Kg/Bag) is required.',
    //         'price_of_palay_per_kg_under_normal_condition_wet_season.required' => 'Farm Information: Production of Palay under Normal Condition during Wet Season 3. Production Cost field is required.',
    //         'production_cost_under_normal_condition_wet_season.required' => 'Farm Information: Production of Palay under Normal Condition during Wet Season 4. Price of Palay per Kg field is required.',

    //         'average_yield_under_stress_condition_wet_season.required' => 'Farm Information: Production of Palay under Stress Condition during Wet Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
    //         'kg_or_bag_of_palay_under_stress_condition_wet_season.required' => 'Farm Information: Production of Palay under Stress Condition during Wet Season 2. Average Yield of Palay (Kg/Bag) is required.',
    //         'price_of_palay_per_kg_under_stress_condition_wet_season.required' => 'Farm Information: Production of Palay under Stress Condition during Wet Season 3. Production Cost field is required.',
    //         'production_cost_under_stress_condition_wet_season.required' => 'Farm Information: Production of Palay under Stress Condition during Wet Season 4. Price of Palay per Kg field is required.',

    //         'ecosystem.required' => 'Farm Information: Ecosystem field is required.',
    //         'stress_ecosystem.required' => 'Farm Information: Stress Ecosystem field is required.',

    //     ];
    // }

    public function batchSize(): int
    {
        return 500;
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function formatContactNumber(string $contactNumber)
    {
        if (substr($contactNumber, 0, 1) == "9") {

            return "0".$contactNumber;

        }

        return $contactNumber ?? null;
    }

    public function getProvinceVal(string $province)
    {
        $province = $this->provinces->where('province', $province)->first();

        return $province->id ?? null;
    }

    public function getCityVal(string $city)
    {
        $city = $this->cities->where('city', $city)->first();

        return $city->id ?? null;
    }

    public function getMunicipalityVal(string $municipality)
    {
        $municipality = $this->municipalities->where('municipality', $municipality)->first();

        return $municipality->id ?? null;
    }

    public function getBarangayVal(string $barangay)
    {
        $barangay = $this->barangays->where('barangay', $barangay)->first();

        return $barangay->id ?? null;
    }

    public function getCivilStatusVal(string $civilStatus)
    {
        $civilStatus = $this->optionsCivilStatus->where('Picklistitem', $civilStatus)->first();

        return $civilStatus->id ?? null;
    }

    public function getEducationalAttainmentVal(string $education)
    {
        $education = $this->optionsEducation->where('Picklistitem', $education)->first();

        return $education->id ?? null;
    }

    public function getRegistrationStatusVal(string $status)
    {
        if (!empty($status)) 
        {
            switch ($status) 
            {
                case 'Registered':
                    return 1;
                    break;

                case 'Not Registered':
                    return 0;
                    break;
                
                default:
                    return null;
                    break;
            }
        }
    }

    public function getLandTenurialStatusVal(string $status)
    {
        $status = $this->optionsLandTenurialStatus->where('Picklistitem', $status)->first();
        
        return $status->id ?? null;
    }

    public function getPickListItemVal(string $item)
    {
        $item = PickListItem::where('Picklistitem', $item)->first();
        
        return $item->id ?? null;
    }

    public function getStressEcosystemVal(string $stressEcosystems)
    {
        $arr = [];
        
        $items = explode(',', $stressEcosystems);

        if (in_array("Flooded/Submerged", $items)) {
            array_push($arr, "0");
        }

        if (in_array("Saline", $items)) {
            array_push($arr, "1");
        }

        if (in_array("Drought", $items)) {
            array_push($arr, "2");
        }

        return !empty($arr) ? $arr : null;
        
    }

    public function getSourcesOfFloodVal(string $sources)
    {
        $arr = [];

        $items = explode(',', $sources);

        foreach ($items as $item) {

            if (!empty($item)) {

                $source = $this->optionsSourceOfFloods->where('Picklistitem', $item)->first();

                if(!is_null($source))
                {
                    array_push($arr, strval($source->id));
                }

            }


        }

        return !empty($arr) ? $arr : null;
    }

    public function getFrequencyVal(string $frequency)
    {
        
        $arr = [];

        $items = explode(',', $frequency);

        foreach ($items as $item) 
        {
            if (!empty($item)) 
            {

                $frequency = $this->optionsFrequency->where('Picklistitem', $item)->first();
    
                if (!is_null($frequency)) 
                {
                    array_push($arr, strval($frequency->id));

                }
                
            }
        }

        return !empty($arr) ? $arr : null;
    }

    public function getMonthsVal(string $months)
    {
        $arr = [];

        $items = explode(',', $months);

        foreach ($items as $item) 
        {
            if (!empty($item)) 
            {
                $month = $this->optionsMonth->where('Picklistitem', $item)->first();

                if (!is_null($month)) 
                {
                    array_push($arr, strval($month->id));

                }
    

            }
        }

        return !empty($arr) ? $arr : null;
    }

    public function getSourceOfSalinity(string $source)
    {
        $arr = [];

        $items = explode(',', $source);

        foreach ($items as $item) 
        {
            if (!empty($item)) 
            {
                $source = $this->optionsSourceOfSalinity->where('Picklistitem', $item)->first();

                if (!is_null($source)) 
                {
                    array_push($arr, strval($source->id));

                }
    
            }
        }

        return !empty($arr) ? $arr : null;
    }

    public function getSourceOfIrrigationVal(string $source)
    {
        $arr = [];

        $items = explode(',', $source);

        foreach ($items as $item) 
        {
            if (!empty($item)) 
            {
                $source = $this->optionsSourceOfIrrigation->where('Picklistitem', $item)->first();

                if (!is_null($source)) 
                {
                    array_push($arr, strval($source->id));

                }
    
                
            }
        }

        return !empty($arr) ? $arr : null;
    }

    public function getSourceOfIrrigationSaltFreeVal(string $source)
    {
        $arr = [];

        $items = explode(',', $source);

        foreach ($items as $item) 
        {
            if (!empty($item)) 
            {

                $item = explode(':', $item);

                $source = $this->optionsSourceOfIrrigation->where('Picklistitem', $item[0])->first();

                if (!is_null($source)) {

                    $arr[$source->id] = (filter_var($item[1], FILTER_VALIDATE_BOOLEAN) ? strval(1) : strval(2));
                    
                }
            }
        }

        return !empty($arr) ? $arr : null;
    }

    public function getIndicatorOfSalinityVal(string $indicator)
    {

        $arr = [];

        $items = explode(',', $indicator);

        foreach ($items as $item) 
        {
            if (!empty($item)) 
            {

                $indicator = $this->optionsIndicatorOfSalinity->where('Picklistitem', $item)->first();

                if (!is_null($indicator)) {

                    array_push($arr, strval($indicator->id));
                    
                }
            }
        }

        return !empty($arr) ? $arr : null;
    }

    public function getIndicatorOfDroughtVal(string $indicator)
    {

        $arr = [];

        $items = explode(',', $indicator);

        foreach ($items as $item) 
        {
            if (!empty($item)) 
            {

                $indicator = $this->optionsIndicatorOfDrought->where('Picklistitem', $item)->first();

                if (!is_null($indicator)) {

                    array_push($arr, strval($indicator->id));
                    
                }
            }
        }

        return !empty($arr) ? $arr : null;

    }

}