<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsPostRequest extends FormRequest
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
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome do produto é obrigatório',
            'name.string' => 'O nome do produto deve ser uma string',
            'name.max' => 'O nome do produto deve ser no máximo :max caracteres',
            'name.min' => 'O nome do produto deve ser no mínimo :min caracteres',
            'price.required' => 'O valor do produto é obrigatório',
            'price.max' => 'O valor do produto deve ser no máximo :max caracteres',
            'price.min' => 'O valor do produto deve ser no mínimo :min caracteres',
            'store_id.required' => 'A loja do produto é obrigatória',
            'store_id.integer' => 'A loja do produto deve ser um valor inteiro',
            'store_id.exists' => 'O produto deve estar em uma loja válida',
            'active.required' => 'O estado do produto é obrigatório',
            'active.boolean' => 'O estado do produto deve ser um valor booleano',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:60|min:3',
            'price' => 'required|max:6|min:3',
            'store_id' => 'required|integer|exists:stores,id',
            'active' => 'required|boolean',
        ];
    }
}
