<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserProfileRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return [
            'input_user_avatar.mime' => 'User Image field must be a file of type: jpeg,png,jpg,svg.',
            'input_user_signature.mime' => 'User Signature field must be a file of type: jpeg,png,jpg,svg.',

            'input_user_avatar.max' => 'User Image field file size exceeds must not be greater than 20MB.',
            'input_user_signature.max' => 'User Signature file size exceeds must not be greater than 20MB.',

        ];
    }
}
