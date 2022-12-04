<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmerRequest extends FormRequest
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
            'input_page1_controlnumber' => ['sometimes', 'nullable', 'min: 2', 'max: 50'],

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
        ];
    }

    public function messages()
    {
        return [
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

            'input_page1_controlnumber.min' => 'A.Farmer\'s Profile: Control Number field needs to be between 11 and 50 numbers.',
            'input_page1_controlnumber.max' => 'A.Farmer\'s Profile: Control Number field needs to be between 11 and 50 numbers.',

            'input_page1_city.required_without' => 'A.Farmer\'s Profile: City Field is required when Municipality Field is not present',
            'input_page1_municipality.required_without' => 'A.Farmer\'s Profile: Municipality Field is required when City Field is not present',
        ];
    }
}
