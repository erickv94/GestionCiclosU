<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DocenteRequest extends FormRequest
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
            'name'=>[
                'required',
                'string',
                'min:10',
                'max:255',
                'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ\.]*)*)+$/'
            ],
            'email'=>[
                'required',
                'string',
                'min:4',
                'max:255',
                'email',
                'regex:/^[a-zA-Z0-9_\.-]{1,20}@ues.edu.sv$/',
                'unique:users,email'
            ],
            'sexo'=>[
                'required',
                Rule::in(['Masculino', 'Femenino']),


            ],
            'gradoAcademico'=>[
                'nullable',
                'regex:/^([a-zA-ZñÑáéíóúÁÉÍÓÚ])+((\s*)+([a-zA-ZñÑáéíóúÁÉÍÓÚ\.]*)*)+$/',
                'max:50',
                'min:4'
            ],
            'materias'=>[
                'nullable',
                'max:4'
            ]
        ];
    }
}
