<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name'  => 'required',
            'module' => 'required|integer',
            'icono'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'module.required' => 'Modulo requerido',
            'module.integer' => 'Modulo requerido',
            'icono.required' => 'Icono requerido'
        ];
    }
}
