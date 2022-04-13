<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'image' => 'required|image',
            'price' => 'required|numeric',
            'indiscount' => 'nullable',
            'discount' => 'nullable|numeric',
            'content' => 'required',
            'code' => 'required|alpha_num',
            'stock' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nombre requerido',
            'category_id.required' => 'Categoria requerido',
            'image.required' => 'Imagen requerida',
            'price.required' => 'Precio requerido',
            'discount.numeric' => 'Debe ser un precio valido',
            'content.required' => 'Contenido requerido',
            'code.required' => 'Codigo del producto requerido',
            'stock.required' => 'Inventario requerido'
        ];
    }
}
