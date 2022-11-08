<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    
    function attributes(){
        return [
            'nombre'     => 'Name',
            'correo' => 'Email',
            'fecha'      => 'Birthday',
        ];
    }

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
            'nombre'     => 'required|string|max:80|min:2',
            'correo' => 'required|string|max:100|min:2',
            'fecha'      => 'required|date',
        ];
    }
    
    function messages() {
        $required = 'The field :attribute is required.';
        $string   = 'The field :attribute it has to be a string of characters.';
        $max      = 'The maximum length of the field :attribute is :max';
        $min      = 'The minimum length of the field :attribute is :min';
        
        return [
            'nombre.required'      => $required,
            'nombre.string'        => $string,
            'nombre.max'           => $max,
            'nombre.min'           => $min,
            'correo.required'      => $required,
            'correo.string'        => $string,
            'correo.max'           => $max,
            'correo.min'           => $min,
            'fecha.required'       => $required,
        ];
    }
}