<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserLoginRequest extends FormRequest
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

            'input_user_email' => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'input_user_password' => ['sometimes', 'nullable', 'min: 2', 'max: 150'],
        ];
    }

    public function messages()
    {
        return [
            
            'input_user_email.required' => 'User Email field is required.',
            'input_user_email.email' => 'User Email field must be a valid email.',

            'input_user_password.min' => 'User Password field needs to be between 2 and 150 characters long.',
            'input_user_password.max' => 'User Password field needs to be between 2 and 150 characters long.',

        ];
    }
}
