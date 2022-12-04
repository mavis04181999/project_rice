<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StressProneAreaRequest extends FormRequest
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
            'input_spa_province' => ['required'],
            'input_spa_city' => ['required_without:input_spa_municipality'],
            'input_spa_municipality' => ['required_without:input_spa_city'],
            'input_spa_barangay' => ['required'],

            'input_spa_stressecosystem' => ['required', 'array'],
            'input_spa_stressecosystem.*' => ['required'],

            'input_spa_totalfarmers' => ['required', 'numeric', 'min: 1'],
            'input_spa_totalstressarea' => ['required', 'numeric', 'min: 1'],

        ];
    }

    public function messages()
    {
        return [
            'input_spa_province.required' => 'Province field is required.',
            // 'input_spa_city.required' => 'City field is required.',
            // 'input_spa_municipality.required' => 'Municipality is required.',
            'input_spa_barangay.required' => 'Barangay field is required.',

            'input_spa_city.required_without' => 'City Field is required when Municipality Field is not present',
            'input_spa_municipality.required_without' => 'Municipality Field is required when City Field is not present',

            'input_spa_stressecosystem.required' => 'Stress Ecosystem field is required.',

            'input_spa_totalfarmers.min' => 'A.Farmer\'s Profile: Age field must be at least 1',
            'input_spa_totalstressarea.min' => 'A.Farmer\'s Profile: Age field must be at least 1',
        ];
    }
}
