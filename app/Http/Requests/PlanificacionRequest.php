<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PlanificacionRequest extends FormRequest
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
            'fechaInicio'=>[
                'required',
                'date',
                'after_or_equal:today'

            ],
            'fechaFin'=>[
                'required',
                'after:fechaInicio',
                'date',
        
            ],
            'ciclo'=>[
                'required',
                Rule::in([1,2]),
            ],
            ];  
        
    }
}
