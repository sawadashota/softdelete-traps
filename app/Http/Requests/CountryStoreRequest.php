<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CountryStoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            // 論理削除されたものも対象になってしまう
            // 'name' => 'required|unique:countries',
            
            'name' => [
                'required',
                Rule::unique('countries')->whereNull('deleted_at')
            ]
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'country name should be present.',
            'name.unique'   => 'country name should be unique.',
        ];
    }
}
