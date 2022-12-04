<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportSurveyRequest extends FormRequest
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
            'input_file' => 'required', 'file', 'mimes:xslx,csv,xls'
        ];
    }

    public function messages()
    {
        return [
            'input_user_avatar.required' => 'Please Upload a file type: xslx, csv, xls.',
            'input_user_avatar.mime' => 'File must be a file of type: xslx, csv, xls.',
        ];
    }
}
