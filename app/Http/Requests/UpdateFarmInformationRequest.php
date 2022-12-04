<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmInformationRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
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
            'input_page2_municipality.required_without' => 'B. Farm Information: Municipality Field is required when City Field is not present',
        ];
    }
}
