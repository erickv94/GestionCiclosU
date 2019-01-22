<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Docente;
use Illuminate\Http\Request;


class DocenteRequestUpdate extends FormRequest
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
                'unique:users,email,'.Docente::findOrFail($this->route('id'))->user_id
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
            'materia'=>[
                'nullable',
                'exists:materias,id',
                 Rule::in($this->materias),
            ],


        ];
    }

    public function messages()
    {
        return [
            'materia.in'=>'La materia que se debe coordinadar, debe ser parte de las que imparte'
        ];
    }
}
