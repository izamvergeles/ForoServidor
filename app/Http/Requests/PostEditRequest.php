<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostEditRequest extends FormRequest
{
    
    function attributes(){
        return [
            'mensaje'  => 'Message',
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
            'mensaje'     => 'required|string|max:100',
        ];
    }
    
    function messages() {
        $required = 'The field :attribute is required.';
        $string   = 'The field :attribute it has to be a string of characters.';
        $max      = 'The maximum length of the field :attribute is :max';
        
        return [
            'mensaje.required'      => $required,
            'mensaje.string'        => $string,
            'mensaje.max'           => $max,
        ];
    }
}