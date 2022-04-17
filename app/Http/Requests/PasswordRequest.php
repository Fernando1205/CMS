<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
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
            'password' => 'required|current_password:web',
            'newPassword' => 'required',
            'confirmPassword' => 'required|same:newPassword'
        ];
    }

    public function messages()
    {
        return [
            'password.required' => 'Contraseña requerida',
            'password.current_password' => 'Contraseña actual incorrecta',
            'newPassword.required' => 'Nueva contraseña requerida',
            'confirmPassword.required' => 'Campo confirmar contraseña es requerida',
            'confirmPassword.same' => 'Las contraseñas no coinciden'
        ];
    }
}
