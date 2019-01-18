<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocalRequestUpdate extends FormRequest
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
            'nombre'=>[
                'required',
                'max:50',
                'min:3',
                'string'
            ],
            'codigo'=>[
                'nullable',
                'max:10',
                'min:1',
                'string',
                'unique:locales,codigo,'.$this->route('id')
            ],
            'tipo'=>[
                'nullable',
                'max:50',
                'min:1',
                'string'

            ],
        ];
    }
}
