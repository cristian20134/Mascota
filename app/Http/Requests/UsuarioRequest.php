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
                    'nombre_usuario' => 'required|min:3|max:30|',
                    'apellido_paterno' => 'required|min:3|max:15|alpha',
                    'apellido_materno' => 'required|min:3|max:15|alpha',
                    'rut_usuario' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:10|unique:usuario',
                    'email_usuario' => 'required|email|unique:usuario',
                    'telefono_usuario' => 'required|numeric|digits:9',
                    'image_usuario' => 'required|image|max:5120',
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
                    'image_usuario' => 'required|image|max:5120',
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
            'image_usuario'=>'Este campo es obligatorio.',

            'nombre_usuario.min'=>'El campo debe tener mínimo :min caracteres.',
            'apellido_paterno.min'=>'El campo debe tener mínimo :min caracteres.',
            'apellido_materno.min'=>'El campo debe tener mínimo :min caracteres.',
            'rut_usuario.min'=>'El campo debe tener mínimo :min caracteres.',

            'nombre_usuario.max'=>'El campo debe tener máximo :max caracteres.',
            'apellido_paterno.max'=>'El campo debe tener máximo :max caracteres.',
            'apellido_materno.max'=>'El campo debe tener máximo :max caracteres.',
            'rut_usuario.max'=>'El campo debe tener máximo :max caracteres.',
            'image_usuario.max' => 'Los archivos no pueden pesar más de 5mb.',

            'telefono_usuario.numeric'=>'El telefóno debe ser número',
            'telefono_usuario.digits'=>'El campo debe tener :digits digitos.',

            'rut_usuario.unique'=>'El rut ya ha sido registrado.',
            'email_usuario.unique'=>'El correo ya ha sido tomado.',
            'image_usuario.image' => 'Solo se aceptan imágenes. Formatos: jpg, jpeg, png, bmp, gif, svg, or webp.'
        ];
    }
}
