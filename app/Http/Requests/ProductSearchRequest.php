<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductSearchRequest extends FormRequest
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
            'text' => 'nullable|string',
            'search' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'text.string' => 'Debe ser texto',
            'search.required' => 'Requerido'
        ];
    }
}
