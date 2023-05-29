<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HistorialRequest extends FormRequest
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
        switch($this->method()){
            case "POST": {
                return[
                    'vacuna' => 'required|min:2|max:2',
                    'enfermedades' => 'required|min:2|max:2',
                    'comentarios' => 'required|min:5|max:100',
                ];
            }
            case "PUT":{
                return[
                    'vacuna' => 'required|min:2|max:2',
                    'enfermedades' => 'required|min:2|max:2',
                    'comentarios' => 'required|min:5|max:100',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'vacuna.required'=>'Este campo es obligatorio',
            'enfermedades.required'=>'Este campo es obligatorio',
            'comentarios.required'=>'Este campo es obligatorio',

            'vacuna.min'=>'Los caracteres minimo son :min.',
            'enfermedades.min'=>'Los caracteres minimo son :min.',
            'comentarios.min'=>'Los caracteres minimo son :min.',

            'vacuna.max'=>'Los caracteres maximos son :max.',
            'enfermedades.max'=>'Los caracteres maximos son :max.',
            'comentarios.max'=>'Los caracteres maximos son :max.',
        ];
    }
}
