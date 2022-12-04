<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFarmerProfileRequest extends FormRequest
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
            'input_page1_avatar' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:10024'],
            'input_page1_signature' => ['sometimes', 'nullable', 'image', 'mimes:jpeg,png,jpg,svg', 'max:10024'],
        ];
    }

    public function messages()
    {
        return [
            'input_page1_avatar.mime' => 'A. Farmer\'s Profile: Farmer Image field must be a file of type: jpeg,png,jpg,svg.',
            'input_page1_signature.mime' => 'A. Farmer\'s Profile: Farmer Signature field must be a file of type: jpeg,png,jpg,svg.',

            'input_page1_avatar.max' => 'A. Farmer\'s Profile: Farmer Image field file size exceeds must not be greater than 10MB.',
            'input_page1_signature.max' => 'A. Farmer\'s Profile: Farmer Signature file size exceeds must not be greater than 10MB.',

        ];
    }
}
