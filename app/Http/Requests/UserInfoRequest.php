<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserInfoRequest extends FormRequest
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
            'name' => 'required',
            'lastname' => 'required',
            'phone' => 'required|numeric',
            'birthday' => 'required|date',
            'gender' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'phone.required' => 'El numerto telefonico es requerido',
            'birthday.required' => 'El cumpleaños es requerido',
            'gender.required' => 'El genero es requerido'
        ];
    }
}
