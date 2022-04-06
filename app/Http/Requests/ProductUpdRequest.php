<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdRequest extends FormRequest
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
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'image' => 'nullable|image',
            'indiscount' => 'nullable',
            'discount' => 'nullable|numeric',
            'status' => 'required|numeric|digits_between:0,1',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'category_id.required' => 'Categoria requerido',
            'price.required' => 'Precio requerido',
            'image.image' => 'Imagen debe ser tipo png-jpg-pneg-gif',
            'discount.numeric' => 'Debe ser un precio valido',
            'status.required' => 'Estatus requerido',
            'content.required' => 'Contenido requerido'
        ];
    }
}
