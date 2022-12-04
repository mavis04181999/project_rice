<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // Page 1: Validation

            'input_page1_avatar' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:10240'],
            'input_page1_signature' => ['required', 'image', 'mimes:jpeg,png,jpg,svg', 'max:10240'],

            'input_page1_controlnumber' => ['sometimes', 'nullable', 'min: 11', 'max: 50'],

            'input_page1_firstname' => ['required', 'min: 2', 'max: 150'],
            'input_page1_lastname' => ['required', 'max: 150'],
            'input_page1_dateofbirth' => ['required', 'before:today'],
            'input_page1_sex' => ['required'],

            'input_page1_country' => ['required', 'min: 2', 'max: 150'],
            'input_page1_streetaddress' => ['required', 'min: 2', 'max: 150'],

            'input_page1_province' => ['required'],
            'input_page1_city' => ['required_without:input_page1_municipality'],
            'input_page1_municipality' => ['required_without:input_page1_city'],
            'input_page1_barangay' => ['required'],

            'input_page1_age' => ['required', 'numeric', "min: 14", "max: 120"], 

            'input_page1_phonenumber' => ['sometimes', 'nullable', 'min: 11', 'max: 20'],
            'input_page1_middlename' => ['sometimes', 'nullable', 'min: 1', 'max: 150'],
            'input_page1_suffix' => ['sometimes', 'nullable', 'max: 150'],


            'input_page1_civilstatus' => ['sometimes', 'nullable'],
            'input_page1_civilstatus_specify' => ['required_if:input_page1_civilstatus,5', 'min: 2', 'max: 150'],
            'input_page1_education' => ['sometimes', 'nullable'],
            'input_page1_education_specify' => ['required_if:input_page1_education,10', 'min: 2', 'max: 150'],
            'input_page1_rsbsareg' => ['sometimes', 'nullable'],

            'input_page1_sourceofincome' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],
            'input_page1_rsbsamembership' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],
            'input_page1_farmingexperience' => ['sometimes', 'nullable', 'numeric'],

            // Page 2: Validation

            'input_page2_country' => ['required', 'min: 2', 'max: 150'],
            'input_page2_streetaddress' => ['required', 'min: 2', 'max: 150'],

            'input_page2_province' => ['required'],
            'input_page2_city' => ['required_without:input_page2_municipality'],
            'input_page2_municipality' => ['required_without:input_page2_city'],
            'input_page2_barangay' => ['required'],

            'input_page2_landtenurialstatus' => ['required'],
            'input_page2_landtenurialstatus_specify' => ['required_if:input_page2_landtenurialstatus,30'],

            'input_page2_totalricearea' => ['required', 'numeric', 'min: 0'],
            'input_page2_totalstressarea' => ['required', 'numeric', 'min: 0'],

            'input_page2_pp_ds_unc_question1' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ds_unc_question2' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ds_unc_question3' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ds_unc_question4' => ['required', 'numeric', 'min: 0'],

            'input_page2_pp_ds_usc_question1' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ds_usc_question2' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ds_usc_question3' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ds_usc_question4' => ['required', 'numeric', 'min: 0'],

            'input_page2_pp_ws_unc_question1' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ws_unc_question2' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ws_unc_question3' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ws_unc_question4' => ['required', 'numeric', 'min: 0'],

            'input_page2_pp_ws_usc_question1' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ws_usc_question2' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ws_usc_question3' => ['required', 'numeric', 'min: 0'],
            'input_page2_pp_ws_usc_question4' => ['required', 'numeric', 'min: 0'],

            'input_page2_ecosystem' => ['required'],
            'input_page2_stressecosystem' => ['required', 'array'],
            'input_page2_stressecosystem.*' => ['required'],

            // Page 3: Validation

            'input_page3_source' => ['sometimes', 'nullable', 'array'],
            'input_page3_source.*' => ['sometimes', 'nullable', 'numeric'],
            'input_page3_source_specify' => ['sometimes', 'nullable', 'min: 2', 'max: 100'],
            'input_page3_frequency' => ['sometimes', 'nullable', 'array'],
            'input_page3_frequency.*' => ['sometimes', 'nullable', 'numeric'],
            
            // 'checkbox_page3_flashflood' => ['required', 'numeric'],
            'input_page3_flashflood_waterlevel' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'input_page3_flashflood_days' => ['sometimes', 'nullable', 'numeric', 'min: 1'],
            'input_page3_flashflood_hours' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            // 'checkbox_page3_intermittent' => ['required', 'numeric'],
            'input_page3_intermittent_waterlevel' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'input_page3_intermittent_days' => ['sometimes', 'nullable', 'numeric', 'min: 1'],
            'input_page3_intermittent_hours' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            // 'checkbox_page3_stagnant' => ['required', 'numeric'],
            'input_page3_stagnant_waterlevel' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'input_page3_stagnant_days' => ['sometimes', 'nullable', 'numeric', 'min: 1'],
            'input_page3_stagnant_hours' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            // 'checkbox_page3_all' => ['required', 'numeric'],
            'input_page3_all_waterlevel' => ['sometimes', 'nullable', 'numeric', 'min: 0'],
            'input_page3_all_days' => ['sometimes', 'nullable', 'numeric', 'min: 1'],
            'input_page3_all_hours' => ['sometimes', 'nullable', 'numeric', 'min: 0'],

            'checkbox_page3_occurenceofflood_ds_months' => ['sometimes', 'nullable', 'array'],
            'checkbox_page3_occurenceofflood_ds_months.*' => ['sometimes', 'nullable', 'integer'],
            'input_page3_occurenceofflood_ds_remarks' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            'checkbox_page3_occurenceofflood_ws_months' => ['sometimes', 'nullable', 'array'],
            'checkbox_page3_occurenceofflood_ws_months.*' => ['sometimes', 'nullable', 'integer'],
            'input_page3_occurenceofflood_ws_remarks' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            // Page 4: Validation
            'input_page4_sourceofsalinity' => ['sometimes', 'nullable', 'array'],
            'input_page4_sourceofsalinity.*' => ['sometimes', 'nullable', 'integer'],
            'input_page4_sourceofsalinity_specify' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            'input_page4_frequency' => ['sometimes', 'nullable', 'array'],
            'input_page4_frequency.*' => ['sometimes', 'nullable', 'integer'],

            'checkbox_page4_occurenceofsalinity_ds_months' => ['sometimes', 'nullable', 'array'],
            'checkbox_page4_occurenceofsalinity_ds_months.*' => ['sometimes', 'nullable', 'integer'],
            'input_page4_occurenceofsalinity_ds_remarks' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            'checkbox_page4_occurenceofsalinity_ws_months' => ['sometimes', 'nullable', 'array'],
            'checkbox_page4_occurenceofsalinity_ws_months.*' => ['sometimes', 'nullable', 'integer'],
            'input_page4_occurenceofsalinity_ws_remarks' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            'checkbox_page4_sourceofirrigation' => ['sometimes', 'nullable', 'array'],
            'checkbox_page4_sourceofirrigation.*' => ['sometimes', 'nullable', 'integer'],
            'input_page4_sourceofirrigation_specify' => ['sometimes', 'nullable',  'min: 2'],

            'checkbox_page4_sourceofirrigation_saltfree' => ['sometimes', 'nullable', 'array'],
            'checkbox_page4_sourceofirrigation_saltfree.*' => ['sometimes', 'nullable', 'integer'],

            'input_page4_indicatorofsalinity' => ['sometimes', 'nullable', 'array'],
            'input_page4_indicatorofsalinity.*' => ['sometimes', 'nullable', 'integer'],
            'input_page4_indicatorofsalinity_specify' => ['sometimes', 'nullable', 'min: 2', 'max: 100'],
            
            // Page 5: Validation
            'input_page5_frequency' => ['sometimes', 'nullable', 'array'],
            'input_page5_frequency.*' => ['sometimes', 'nullable', 'integer'],

            'checkbox_page5_occurenceofdrought_ds_months' => ['sometimes', 'nullable', 'array'],
            'checkbox_page5_occurenceofdrought_ds_months.*' => ['sometimes', 'nullable', 'integer'],
            'input_page5_occurenceofdrought_ds_remarks' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            'checkbox_page5_occurenceofdrought_ws_months' => ['sometimes', 'nullable', 'array'],
            'checkbox_page5_occurenceofdrought_ws_months.*' => ['sometimes', 'nullable', 'integer'],
            'input_page5_occurenceofdrought_ws_remarks' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            'checkbox_page5_sourceofirrigation' => ['sometimes', 'nullable', 'array'],
            'checkbox_page5_sourceofirrigation.*' => ['sometimes', 'nullable', 'integer'],
            'input_page5_sourceofirrigation_specify' => ['sometimes', 'nullable', 'min: 2'],

            'checkbox_page5_sourceofirrigation_saltfree' => ['sometimes', 'nullable', 'array'],
            'checkbox_page5_sourceofirrigation_saltfree.*' => ['sometimes', 'nullable', 'integer'],

            'input_page5_indicatorofdrought' => ['sometimes', 'nullable', 'array'],
            'input_page5_indicatorofdrought.*' => ['sometimes', 'nullable', 'integer'],
            'input_page5_indicatorofdrought_specify' => ['sometimes', 'nullable', 'min: 2', 'max: 100'],
        ];
    }

    public function messages()
    {
        return [
            'input_page1_avatar.required' => 'A. Farmer\'s Profile: Farmer Image field is required.',
            'input_page1_signature.required' => 'A. Farmer\'s Profile: Farmer Signature field is required.',

            'input_page1_firstname.required' => 'A. Farmer\'s Profile: First name field is required.',
            'input_page1_lastname.required' => 'A. Farmer\'s Profile: Last name field is required.',
            'input_page1_dateofbirth.required' => 'A. Farmer\'s Profile: Date of Birth field is required.',
            'input_page1_sex.required' => 'A. Farmer\'s Profile: Sex field is required.',
            'input_page1_country.required' => 'A. Farmer\'s Profile: Country field is required.',
            'input_page1_streetaddress.required' => 'A. Farmer\'s Profile: Street Address field is required.',
            'input_page1_province.required' => 'A. Farmer\'s Profile: Province field is required.',
            'input_page1_city.required' => 'A. Farmer\'s Profile: City field is required.',
            'input_page1_municipality.required' => 'A. Farmer\'s Profile: Municipality field is required.',
            'input_page1_barangay.required' => 'A. Farmer\'s Profile: Barangay field is required.',

            'input_page1_firstname.min' => 'A.Farmer\'s Profile: First name field needs to be between 2 and 150 characters long.',
            'input_page1_lastname.min' => 'A.Farmer\'s Profile: Last name field needs to be between 2 and 150 characters long.',
            'input_page1_country.min' => 'A.Farmer\'s Profile: Country field needs to be between 2 and 150 characters long.',
            'input_page1_streetAddress.min' => 'A.Farmer\'s Profile: Street Address field needs to be between 2 and 150 characters long.',
            'input_page1_middlename.min' => 'A.Farmer\'s Profile: Middle name field needs to be between 1 and 150 characters long.',
            'input_page1_suffix.min' => 'A.Farmer\'s Profile: Suffix name field needs to be between 1 and 150 characters long.',
            'input_page1_age.min' => 'A.Farmer\'s Profile: Age field must be at least 14 years old.',
            'input_page1_phonenumber.min' => 'A.Farmer\'s Profile: Phone number field needs to be between 11 and 20 numbers.',
            'input_page1_civilstatus_specify.min' => 'A.Farmer\'s Profile: Civil Status - Specify field needs to be between 2 and 150 characters long.',
            'input_page1_education_specify.min' => 'A.Farmer\'s Profile: Education - Specify field needs to be between 2 and 150 characters long.',
            'input_page1_sourceofincome.min' => 'A.Farmer\'s Profile: Major Source of Income field needs to be between 2 and 150 characters long.',
            'input_page1_rsbsamembership.min' => 'A.Farmer\'s Profile: RSBSA Membership field needs to be between 2 and 150 characters long.',

            'input_page1_age.max' => 'A.Farmer\'s Profile: Age field must not be greater than 120 years old.',
            'input_page1_phonenumber.max' => 'A.Farmer\'s Profile: Phone number field needs to be between 11 and 150 numbers.',

            'input_page1_dateofbirth.before' => 'A.Farmer\'s Profile: Date of Birth must be a date before today.',

            'input_page1_city.required_without' => 'A.Farmer\'s Profile: City Field is required when Municipality Field is not present',
            'input_page1_municipality.required_without' => 'A.Farmer\'s Profile: Municipality Field is required when City Field is not present',

            'input_page1_controlnumber.min' => 'A.Farmer\'s Profile: Control Number field needs to be between 11 and 50 characters long.',
            'input_page1_controlnumber.max' => 'A.Farmer\'s Profile: Control Number field needs to be between 11 and 50 characters long.',

            'input_page1_avatar.mime' => 'A. Farmer\'s Profile: Farmer Image field must be a file of type: jpeg,png,jpg,svg.',
            'input_page1_signature.mime' => 'A. Farmer\'s Profile: Farmer Signature field must be a file of type: jpeg,png,jpg,svg.',

            'input_page1_avatar.max' => 'A. Farmer\'s Profile: Farmer Image field file size exceeds must not be greater than 10MB.',
            'input_page1_signature.max' => 'A. Farmer\'s Profile: Farmer Signature file size exceeds must not be greater than 10MB.',

            // Page 2:
            'input_page2_country.required' => 'B. Farm Information: Country field is required.',
            'input_page2_streetaddress.required' => 'B. Farm Information: Street Address field is required.',
            'input_page2_province.required' => 'B. Farm Information: Province field is required.',
            'input_page2_city.required' => 'B. Farm Information: City field is required.',
            'input_page2_municipality.required' => 'B. Farm Information: Municipality field is required.',
            'input_page2_barangay.required' => 'B. Farm Information: Barangay field is required.',
            'input_page2_landtenurialstatus.required' => 'B. Farm Information: Land Tenurial Status field is required.',
            'input_page2_landtenurialstatus_specify.required' => 'B. Farm Information: Land Tenurial Status - Specify field is required.',
            'input_page2_landtenurialstatus_specify.required_if' => 'B. Farm Information: Land Tenurial Status - Specify field is required.',
            'input_page2_totalricearea.required' => 'B. Farm Information: Total Rice Area field is required.',
            'input_page2_totalstressarea.required' => 'B. Farm Information: Total Rice Stress Area field is required.',
            'input_page2_pp_ds_unc_question1.required' => 'B. Farm Information: Production of Palay under Normal Condition during Dry Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
            'input_page2_pp_ds_unc_question2.required' => 'B. Farm Information: Production of Palay under Normal Condition during Dry Season 2. Average Yield of Palay (Kg/Bag) is required.',
            'input_page2_pp_ds_unc_question3.required' => 'B. Farm Information: Production of Palay under Normal Condition during Dry Season 3. Production Cost field is required.',
            'input_page2_pp_ds_unc_question4.required' => 'B. Farm Information: Production of Palay under Normal Condition during Dry Season 4. Price of Palay per Kg field is required.',
            'input_page2_pp_ds_usc_question1.required' => 'B. Farm Information: Production of Palay under Stress Condition during Dry Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
            'input_page2_pp_ds_usc_question2.required' => 'B. Farm Information: Production of Palay under Stress Condition during Dry Season 2. Average Yield of Palay (Kg/Bag) is required.',
            'input_page2_pp_ds_usc_question3.required' => 'B. Farm Information: Production of Palay under Stress Condition during Dry Season 3. Production Cost field is required.',
            'input_page2_pp_ds_usc_question4.required' => 'B. Farm Information: Production of Palay under Stress Condition during Dry Season 4. Price of Palay per Kg field is required.',
            'input_page2_pp_ws_unc_question1.required' => 'B. Farm Information: Production of Palay under Normal Condition during Wet Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
            'input_page2_pp_ws_unc_question2.required' => 'B. Farm Information: Production of Palay under Normal Condition during Wet Season 2. Average Yield of Palay (Kg/Bag) is required.',
            'input_page2_pp_ws_unc_question3.required' => 'B. Farm Information: Production of Palay under Normal Condition during Wet Season 3. Production Cost field is required.',
            'input_page2_pp_ws_unc_question4.required' => 'B. Farm Information: Production of Palay under Normal Condition during Wet Season 4. Price of Palay per Kg field is required.',
            'input_page2_pp_ws_usc_question1.required' => 'B. Farm Information: Production of Palay under Stress Condition during Wet Season 1. Average Yield based on Actual Area(Bag/Ha) field is required.',
            'input_page2_pp_ws_usc_question2.required' => 'B. Farm Information: Production of Palay under Stress Condition during Wet Season 2. Average Yield of Palay (Kg/Bag) is required.',
            'input_page2_pp_ws_usc_question3.required' => 'B. Farm Information: Production of Palay under Stress Condition during Wet Season 3. Production Cost field is required.',
            'input_page2_pp_ws_usc_question4.required' => 'B. Farm Information: Production of Palay under Stress Condition during Wet Season 4. Price of Palay per Kg field is required.',
            'input_page2_ecosystem.required' => 'B. Farm Information: Ecosystem field is required.',
            'input_page2_stressecosystem.required' => 'B. Farm Information: Stress Ecosystem field is required.',

            'input_page2_country.min' => 'B. Farm Information: Country field must be at least 2 characters.',
            'input_page2_streetAddress.min' => 'B. Farm Information: Street Address field must be at least 2 characters.',

            'input_page2_city.required_without' => 'B. Farm Information: City Field is required when Municipality Field is not present',

            'input_page2_municipality.required_without' => 'B. Farm Information: Municipality Field is required when City Field is not present',
            
            // Page 3:
            'input_page3_source_specify.min' => 'C. Flooding/Submergence Ecosystem: Source of Flood field needs to be between 2 and 150 characters long.',
            'input_page3_flashflood_waterlevel.min' => 'C. Flooding/Submergence Ecosystem: Flashflood Water Level field must be at least 0',
            'input_page3_flashflood_days.min' => 'C. Flooding/Submergence Ecosystem: Flashflood Duration (No. of Days) field must be at least 1',
            'input_page3_flashflood_hours.min' => 'C. Flooding/Submergence Ecosystem: Flashflood Duration (No. of Hours) field must be at least 0',
            'input_page3_intermittent_waterlevel.min' => 'C. Flooding/Submergence Ecosystem: Intermittent Water Level field must be at least 0',
            'input_page3_intermittent_days.min' => 'C. Flooding/Submergence Ecosystem: Intermittent Duration (No. of Days) field must be at least 1',
            'input_page3_intermittent_hours.min' => 'C. Flooding/Submergence Ecosystem: Intermittent Duration (No. of Hours) field must be at least 0',
            'input_page3_stagnant_waterlevel.min' => 'C. Flooding/Submergence Ecosystem: Stagnant Water Level field must be at least 0',
            'input_page3_stagnant_days.min' => 'C. Flooding/Submergence Ecosystem: Stagnant Duration (No. of Days) field must be at least 1',
            'input_page3_stagnant_hours.min' => 'C. Flooding/Submergence Ecosystem: Stagnant Duration (No. of Hours) field must be at least 0',
            'input_page3_all_waterlevel.min' => 'C. Flooding/Submergence Ecosystem: All of the Above Water Level field must be at least 0',
            'input_page3_all_days.min' => 'C. Flooding/Submergence Ecosystem: All of the Above Duration (No. of Days) field must be at least 1',
            'input_page3_all_hours.min' => 'C. Flooding/Submergence Ecosystem: All of the Above Duration (No. of Hours) field must be at least 0',
            'input_page3_occurenceofflood_ds_remarks.min' => 'C. Flooding/Submergence Ecosystem: Occurence of Flood Dry Season Remarks field needs to be between 2 and 150 characters long.',
            'input_page3_occurenceofflood_ws_remarks.min' => 'C. Flooding/Submergence Ecosystem: Occurence of Flood Wet Season Remarks field needs to be between 2 and 150 characters long.',

            'input_page3_occurenceofflood_ds_remarks.max' => 'C. Flooding/Submergence Ecosystem: Occurence of Flood Dry Season Remarks field needs to be between 2 and 150 characters long.',
            'input_page3_occurenceofflood_ws_remarks.max' => 'C. Flooding/Submergence Ecosystem: Occurence of Flood Wet Season Remarks field needs to be between 2 and 150 characters long.',

            // Page 4:
            'input_page4_sourceofsalinity_specify.min' => 'D. Salt Water Intrusion Ecosystem: Source of Salinity field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ds_remarks.min' => 'D. Salt Water Intrusion Ecosystem: Occurence of Salinity during Dry Season (Remarks) field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ws_remarks.min' => 'D. Salt Water Intrusion Ecosystem: Occurence of Salinity during Wet Season (Remarks) field needs to be between 2 and 150 characters long.',
            'input_page4_sourceofirrigation_specify.min' => 'D. Salt Water Intrusion Ecosystem: Source of Irrigation Specify field needs to be between 2 and 150 characters long.',

            'input_page4_sourceofsalinity_specify.max' => 'D. Salt Water Intrusions Ecosystem: Source of Irrigation Specify field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ds_remarks.max' => 'D. Salt Water Intrusions Ecosystem: Occurence of Salinity during Dry Season (Months) field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ws_remarks.max' => 'D. Salt Water Intrusions Ecosystem: Occurence of Salinity during Wet Season (Remarks) field needs to be between 2 and 150 characters long.',
            'input_page4_sourceofirrigation_specify.max' => 'D. Salt Water Intrusions Ecosystem: Source of Irrigation Specify field needs to be between 2 and 150 characters long.',

            // Page 5:
            'input_page5_occurenceofdrought_ds_remarks.min' => 'E. Drought Ecosystem: Occurence of Drought during Dry Season (Remarks) field needs to be between 2 and 150 characters long.',
            'input_page5_occurenceofdrought_ws_remarks.min' => 'E. Drought Ecosystem: Occurence of Drought during Wet Season (Remarks) field needs to be between 2 and 150 characters long.',
            'input_page5_sourceofirrigation_specify.min' => 'E. Drought Ecosystem: Source of Irrigation Specify field needs to be between 2 and 150 characters long.',
            'input_page5_occurenceofdrought_ds_remarks.max' => 'E. Drought Ecosystem: Occurence of Drought during Dry Season field needs to be between 2 and 150 characters long.',
            'input_page5_occurenceofdrought_ws_remarks.max' => 'E. Drought Ecosystem: Occurence of Drought during Wet Season field needs to be between 2 and 150 characters long.',


        ];
    }
}

