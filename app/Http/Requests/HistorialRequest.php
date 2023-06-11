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
                    'nombre_ficha' => 'required|min:5|max:20',
                    'vacuna' => 'required|min:2|max:2|alpha',
                    'enfermedades' => 'required|min:2|max:2|alpha',
                    'comentarios' => 'required|min:5|max:700',
                ];
            }
            case "PUT":{
                return[
                    'nombre_ficha' => 'required|min:5|max:20',
                    'vacuna' => 'required|min:2|max:2|alpha',
                    'enfermedades' => 'required|min:2|max:2|alpha',
                    'comentarios' => 'required|min:5|max:700',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'nombre_ficha.required'=>'Este campo es obligatorio.',
            'vacuna.required'=>'Este campo es obligatorio.',
            'enfermedades.required'=>'Este campo es obligatorio.',
            'comentarios.required'=>'Este campo es obligatorio.',

            'nombre_ficha.min'=>'El campo debe tener mínimo :min caracteres.',
            'vacuna.min'=>'El campo debe tener mínimo :min caracteres.',
            'enfermedades.min'=>'El campo debe tener mínimo :min caracteres.',
            'comentarios.min'=>'El campo debe tener mínimo :min caracteres.',

            'nombre_ficha.max'=>'El campo debe tener máximo :max caracteres.',
            'vacuna.max'=>'El campo debe tener máximo :max caracteres.',
            'enfermedades.max'=>'El campo debe tener máximo :max caracteres.',
            'comentarios.max'=>'El campo debe tener máximo :max caracteres.',

            'vacuna.alpha'=>'El campo solo debe contener letras.',
            'enfermedades.alpha'=>'El campo solo debe contener letras.',
        ];
    }
}
