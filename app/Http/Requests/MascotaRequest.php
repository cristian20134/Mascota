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
                    'nombre_mascota'=>'required',
                    'select_raza'=>'required|exists:raza,id',
                    'genero_mascota'=>'required|exists:genero_mascota,id',
                    'tamano'=>'required|exists:tamano,id',
                    'personalidad_mascota'=>'required|exists:personalidad_mascota,id',
                    'historial_medico'=>'required|exists:historial_medico,id',
                    'fecha_nacimiento_mascota'=>'required|date_format:Y-m-d',
                    'comentario_mascota'=>'required|min:5',
                ];
            }
            case "PUT":{
                return[
                    'nombre_mascota'=>'required',
                    'select_raza'=>'required|exists:raza,id',
                    'genero_mascota'=>'required|exists:genero_mascota,id',
                    'tamano'=>'required|exists:tamano,id',
                    'personalidad_mascota'=>'required|exists:personalidad_mascota,id',
                    'historial_medico'=>'required|exists:historial_medico,id',
                    'fecha_nacimiento_mascota'=>'required|date_format:Y-m-d',
                    'comentario_mascota'=>'required|min:5',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'nombre_mascota'=>'Este campo es obligatorio',
            'select_raza'=>'Este campo es obligatorio',
            'genero_mascota'=>'Este campo es obligatorio',
            'tamano'=>'Este campo es obligatorio',
            'personalidad_mascota'=>'Este campo es obligatorio',
            'historial_medico'=>'Este campo es obligatorio',
            'fecha_nacimiento_mascota'=>'Este campo es obligatorio',
            'comentario_mascota'=>'Este campo es obligatorio',
        ];
    }
}