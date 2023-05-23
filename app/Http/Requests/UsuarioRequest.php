<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
                    'nombre_usuario' => 'required|min:5|max:100',
                    'apellido_paterno' => 'required|min:4|max:100',
                    'apellido_materno' => 'required|min:4|max:100',
                    'rut_usuario' => 'required|min:1|max:9',
                    'email_usuario' => 'required|min:1|max:100',
                    'telefono_usuario' => 'required|min:1|max:100',
                ];
            }
        }
        
    }

    public function messages(){   
        return [
            'nombre_usuario.required'=>'Este campo es obligatorio',
            'apellido_paterno.required'=>'Este campo es obligatorio',
            'apellido_materno.required'=>'Este campo es obligatorio',
            'rut_usuario.required'=>'Este campo es obligatorio',
            'email_usuario.required'=>'Este campo es obligatorio',
            'telefono_usuario.required'=>'Este campo es obligatorio',
        ];
    }
}
