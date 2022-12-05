<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidatedPatient extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //'name' => 'required|max:45',
            'name' => 'required|string',
            'lastName' => 'required|string',
            'typeId' => 'required|string',
            'sex' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'typeId.required' => 'Seleccione un tipo de paciente'
        ];
    }
}
