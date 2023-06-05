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
                    'nombre_usuario' => 'required|min:3|max:30',
                    'apellido_paterno' => 'required|min:3|max:30|alpha',
                    'apellido_materno' => 'required|min:3|max:30|alpha',
                    'rut_usuario' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:10',
                    'email_usuario' => 'required|email|unique:usuario',
                    'telefono_usuario' => 'required|numeric|digits:9',
                ];
            }
            case "PUT":{
                return[
                    'nombre_usuario' => 'required|min:3|max:30',
                    'apellido_paterno' => 'required|min:3|max:30',
                    'apellido_materno' => 'required|min:3|max:30',
                    'rut_usuario' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:10',
                    'email_usuario' => 'required|email',
                    'telefono_usuario' => 'required|numeric|digits:9',
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

            'telefono_usuario.numeric'=>'El telefóno debe ser número',

              'email_usuario.unique'=>'El correo ya ha sido tomado.',
        ];
    }
}
