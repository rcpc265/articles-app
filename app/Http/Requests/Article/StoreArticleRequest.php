<?php

namespace App\Http\Requests\Article;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'name'        => ['required' ,'string', 'max:10'],
            'code'        => ['required' ,'integer', 'max:8'],
            'description' => ['required' ,'string', 'max:10'],
            'status'      => ['required' ,'string'],
            'price'       => ['required' ,'float'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'El campo nombre es requerido',
            'name.string'          => 'El campo nombre debe ser un texto',
            'name.max'             => 'El campo nombre debe tener una longitud maxima de 10 caracteres',


            'code.required'        => 'El campo código es requerido',
            'code.integer'         => 'El campo código debe ser un numero',
            'code.max'             => 'El campo código debe tener una longitud maxima de 8 caracteres',

            'description.required' => 'El campo nombre es requerido',
            'description.string'   => 'El campo nombre debe ser un texto',
            'description.max'      => 'El campo nombre debe tener una longitud maxima de 10 caracteres',

            'status.required'      => 'El campo estado es requerido',
            'status.string'        => 'El campo estado debe ser "on" o "off"',

            'price.required'       => 'El campo precio es requerido',
            'price.integer'        => 'El campo precio debe ser un numero',
        ];
    }
}