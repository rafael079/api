<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoresPutRequest extends FormRequest
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
            'name.required' => 'O Nome da Loja é obrigatório',
            'name.string' => 'O nome da Loja deve ser uma string',
            'name.max' => 'O nome da Loja deve ser no máximo :max caracteres',
            'name.min' => 'O nome da Loja deve ser no mínimo :min caracteres',
            'email.required' => 'O Email da Loja é obrigatório',
            'email.email' => 'O Email da loja deve ser um email válido',
            'email.unique' => 'O Email :unique já existe',
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
            'name' => 'required|string|max:40|min:3',
            'email' => [
                'required',
                'email',
                Rule::unique('stores')->ignore($this->id),
            ]
        ];
    }
}
