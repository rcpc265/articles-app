<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'name'        => ['required', 'string', 'max:10'],
            'code'        => ['required', 'regex:/[A-Z]{4}[0-4]{4}/'],
            'description' => ['string', 'max:150'],
            'status'      => ['string', 'in:ON,OFF'],
            'price'       => ['required', 'regex:/^\d{1,4}(\.\d{1,2})?$/'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'El campo nombre es requerido.',
            'name.string'          => 'El campo nombre debe ser un texto.',
            'name.max'             => 'El campo nombre debe tener una longitud maxima de 10 caracteres.',


            'code.required'        => 'El campo código es requerido.',
            'code.regex'           => 'El campo código debe contener cuatro letras en mayúscula seguido de 4 digitos.',

            'description.required' => 'El campo nombre es requerido.',
            'description.string'   => 'El campo nombre debe ser un texto.',
            'description.max'      => 'El campo nombre debe tener una longitud maxima de 10 caracteres.',

            'status.required'      => 'El campo estado es requerido.',
            'status.in'            => 'El campo estado debe ser "ON" o "OFF".',

            'price.required'       => 'El campo precio es requerido.',
            'price.regex'          => 'El campo precio debe ser un número con o sin dos decimales de precisión.',
        ];
    }
}
