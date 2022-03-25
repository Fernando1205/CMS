<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'passwordConfirm' => 'required|min:8|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'lastname.required' => 'Apellidos requeridos',
            'email.required' => 'Email requerido',
            'email.email' => 'Porfavor ingrese un correo valido',
            'email.unique' => 'El email ya existe en nuestros registros',
            'password.required' => 'Contraseña requerido',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres',
            'passwordConfirm.required' => 'Confirmar contraseña requerido',
            'passwordConfirm.min' => 'La contraseña debe tener al menos 8 caracteres',
            'passwordConfirm.same' => 'Es necesario confirmar la contraseña',
        ];
    }
}
