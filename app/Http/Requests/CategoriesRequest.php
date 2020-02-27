<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
            'name'=>'required|min:3',
            'description' => 'required|min:10',
        ];
    }

    public function messages() {
        return [
            'name.required'=>'O campo  :attribute é obrigatório!',
            'name.min'=>'O campo  :attribute deve conter no mínimo 3 caracteres!',

            'description.required'=>'O campo  :attribute é obrigatório!',
            'description.min'=>'O campo  :attribute deve conter no mínimo 10 caracteres!',
        ];
    }
}
