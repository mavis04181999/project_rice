<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'input_user_avatar' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:1024'],
            'input_user_signature' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:1024'],

            'input_user_email' => ['required', 'email', 'unique:users,email'],
            'input_user_password' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],

            'input_user_role' => ['required'],
            
            'input_user_firstname' => ['required', 'min: 2', 'max: 150'],
            'input_user_lastname' => ['required', 'max: 150'],
            'input_user_dateofbirth' => ['required', 'before:today'],
            'input_user_sex' => ['required'],

            'input_user_country' => ['required', 'min: 2', 'max: 150'],
            'input_user_streetaddress' => ['required', 'min: 2', 'max: 150'],

            'input_user_province' => ['required'],
            'input_user_city' => ['required_without:input_user_municipality'],
            'input_user_municipality' => ['required_without:input_user_city'],
            'input_user_barangay' => ['required'],

            'input_user_age' => ['required', 'numeric', "min: 14", "max: 120"], 

            'input_user_phonenumber' => ['sometimes', 'nullable', 'min: 11', 'max: 20'],
            'input_user_middlename' => ['sometimes', 'nullable', 'min: 1', 'max: 150'],
            'input_user_suffix' => ['sometimes', 'nullable', 'max: 150'],      

        ];
    }

    public function messages()
    {
        return [
            'input_user_email.required' => 'User Email field is required.',
            'input_user_email.email' => 'User Email field must be a valid email.',

            'input_user_password.min' => 'User Password field needs to be between 2 and 150 characters long.',
            'input_user_password.max' => 'User Password field needs to be between 2 and 150 characters long.',

            'input_user_avatar.mime' => 'User Image field must be a file of type: jpeg,png,jpg,svg.',
            'input_user_signature.mime' => 'User Signature field must be a file of type: jpeg,png,jpg,svg.',

            'input_user_avatar.max' => 'User Image field file size exceeds must not be greater than 20MB.',
            'input_user_signature.max' => 'User Signature file size exceeds must not be greater than 20MB.',

            'input_user_role.required' => 'User Role field is required.',

            'input_user_firstname.required' => 'User: First name field is required.',
            'input_user_lastname.required' => 'User: Last name field is required.',
            'input_user_dateofbirth.required' => 'User: Date of Birth field is required.',
            'input_user_sex.required' => 'User: Sex field is required.',
            'input_user_country.required' => 'User: Country field is required.',
            'input_user_streetaddress.required' => 'User: Street Address field is required.',
            'input_user_province.required' => 'User: Province field is required.',
            'input_user_city.required' => 'User: City field is required.',
            'input_user_municipality.required' => 'User: Municipality field is required.',
            'input_user_barangay.required' => 'User: Barangay field is required.',

            'input_user_firstname.min' => 'User: First name field needs to be between 2 and 150 characters long.',
            'input_user_lastname.min' => 'User: Last name field needs to be between 2 and 150 characters long.',
            'input_user_country.min' => 'User: Country field needs to be between 2 and 150 characters long.',
            'input_user_streetAddress.min' => 'User: Street Address field needs to be between 2 and 150 characters long.',
            'input_user_middlename.min' => 'User: Middle name field needs to be between 1 and 150 characters long.',
            'input_user_suffix.min' => 'User: Suffix name field needs to be between 1 and 150 characters long.',
            'input_user_age.min' => 'User: Age field must be at least 14 years old.',
            'input_user_phonenumber.min' => 'User: Phone number field needs to be between 11 and 20 numbers.',

            'input_user_age.max' => 'User: Age field must not be greater than 120 years old.',
            'input_user_phonenumber.max' => 'User: Phone number field needs to be between 11 and 150 numbers.',

            'input_user_dateofbirth.before' => 'User: Date of Birth must be a date before today.',

            'input_user_city.required_without' => 'User: City Field is required when Municipality Field is not present',
            'input_user_municipality.required_without' => 'User: Municipality Field is required when City Field is not present',

        ];
    }
}
