<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmExtendedInformationRequest extends FormRequest
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
            // Page 3: Validation

            'farm_extended_id' => ['required'],

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
        ];
    }

    public function messages()
    {
        return [
            // Page 3:
            'input_page3_source_specify.min' => 'C. Flooding/Submergence Ecosystem: First name field needs to be between 2 and 150 characters long.',
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
            'input_page4_sourceofsalinity_specify.min' => 'C. Flooding/Submergence Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ds_remarks.min' => 'C. Flooding/Submergence Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ws_remarks.min' => 'C. Flooding/Submergence Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page4_sourceofirrigation_specify.min' => 'C. Flooding/Submergence Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page4_sourceofsalinity_specify.min' => 'D. Salt Water Intrusions Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ds_remarks.min' => 'D. Salt Water Intrusions Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page4_occurenceofsalinity_ws_remarks.min' => 'D. Salt Water Intrusions Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page4_sourceofirrigation_specify.min' => 'D. Salt Water Intrusions Ecosystem: First name field needs to be between 2 and 150 characters long.',

            // Page 5:
            'input_page5_occurenceofdrought_ds_remarks.min' => 'E. Drought Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page5_occurenceofdrought_ws_remarks.min' => 'E. Drought Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page5_sourceofirrigation_specify.min' => 'E. Drought Ecosystem: First name field needs to be between 2 and 150 characters long.',
            'input_page5_occurenceofdrought_ds_remarks.max' => 'E. Drought Ecosystem: field needs to be between 2 and 150 characters long.',
            'input_page5_occurenceofdrought_ws_remarks.max' => 'E. Drought Ecosystem: field needs to be between 2 and 150 characters long.',
        ];
    }
}
