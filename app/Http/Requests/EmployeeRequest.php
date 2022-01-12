<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeRequest extends FormRequest
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
            'name' => ['required','max:40'],
            'lastname' =>  ['required','max:40'],
            'dni' =>  ['required','min:8',Rule::unique('users', 'dni')->ignore($this->employee)],
            'phone' =>  ['required','min:9'],
            'email' =>  ['required','email'],
            'date' =>  ['required','date'],
        ];
    }
    public function messages()
{
    return [
        'dni.unique' => 'El dni ya esta registrado',
        'name.required' => 'El nombre es requerido',
        'lastname.required' => 'El apellido es requerido',
        'dni.required' => 'El dni es requerido',
        'phone.required' => 'El N° celular es requerido',
        'email.required' => 'El email es requerido',
        'date.required' => 'La fecha de nacimiento es requerido',
    ];
}
}
