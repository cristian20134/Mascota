<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MascotaRequest extends FormRequest
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
                    'nombre_mascota'=>'required|min:3|max:25',
                    'select_raza'=>'required|exists:raza,id',
                    'genero_mascota'=>'required|exists:genero_mascota,id',
                    'tamano'=>'required|exists:tamano,id',
                    'personalidad_mascota'=>'required|exists:personalidad_mascota,id',
                    'historial_medico'=>'required|exists:historial_medico,id',
                    'fecha_nacimiento_mascota'=>'required|date_format:Y-m-d',
                    'comentario_mascota'=>'required|min:5|max:600',
                    'image_mascota'=>'required|image|max:5120'
                ];
            }
            case "PUT":{
                return[
                    'nombre_mascota'=>'required|min:3|max:25',
                    'select_raza'=>'required|exists:raza,id',
                    'genero_mascota'=>'required|exists:genero_mascota,id',
                    'tamano'=>'required|exists:tamano,id',
                    'personalidad_mascota'=>'required|exists:personalidad_mascota,id',
                    'historial_medico'=>'required|exists:historial_medico,id',
                    'fecha_nacimiento_mascota'=>'required|date_format:Y-m-d',
                    'comentario_mascota'=>'required|image|min:5',
                    'image_mascota'=>'required|image|max:5120'
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'nombre_mascota.required'=>'Este campo es obligatorio.',
            'select_raza.required'=>'Este campo es obligatorio.',
            'genero_mascota.required'=>'Este campo es obligatorio.',
            'tamano.required'=>'Este campo es obligatorio.',
            'personalidad_mascota.required'=>'Este campo es obligatorio.',
            'historial_medico.required'=>'Este campo es obligatorio.',
            'fecha_nacimiento_mascota.required'=>'Este campo es obligatorio.',
            'comentario_mascota.required'=>'Este campo es obligatorio.',
            'image_mascota.required'=>'Este campo es obligatorio.',

            'nombre_mascota.min'=>'El campo debe tener mínimo :min caracteres.',
            'comentario_mascota.min'=>'El campo debe tener mínimo :min caracteres.',

            'nombre_mascota.max'=>'El campo debe tener máximo :max caracteres.',
            'comentario_mascota.max'=>'El campo debe tener máximo :max caracteres.',
            'image_mascota.max' => 'Los archivos no pueden pesar más de 5mb.',

            'fecha_nacimiento_mascota' => 'El formato de fecha válido es dd-mm-AAAA.',

            'image_mascota.image' => 'Solo se aceptan imágenes. Formatos: jpg, jpeg, png, bmp, gif, svg, or webp.',

        ];
    }
}