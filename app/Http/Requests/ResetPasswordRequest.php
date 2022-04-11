<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'email' => 'required|email|exists:users,email',
            'code' => 'required|exists:users,password_code',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Correo requerido',
            'email.exists' => 'El correo no existe en nuestros apartados',
            'code.required' => 'Codigo requerido',
            'code.exists' => 'El codigo introducido no existe',
            'password.required' => 'Contraseña requerida'
        ];
    }
}
