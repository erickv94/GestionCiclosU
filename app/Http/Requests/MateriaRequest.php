<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MateriaRequest extends FormRequest
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
            'codigo'=>[
                'unique:materias,codigo',
                'max:10',
                'min:2',
                'required'
            ],
            'nombre'=>[
                'required',
                'max:50',
                'min:3',
                'string'
            ],
            'descripcion'=>[
                'nullable',
                'max:255',
                'string',      
            ],
            'ciclo'=>
            [
                'required',
                Rule::in(['Impar','Par','Ambos'])
            ],
            'nivel'=>
            [
                'required',
                Rule::in([1,2,3,4,5])
            ],

            'gruposLaboratorio'=>
            [
                'numeric',
                'min:1',
                'max:10',
                'required',
                
            ],
            'gruposTeorico'=>
            [
                'numeric',
                'min:1',
                'max:10',
                'required',
                
            ],
        ];
    }}
