<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdopcionRequest extends FormRequest
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
                    'select_usuario'=>'required|exists:usuario,id',
                    'select_mascota'=>'required|exists:mascota,id',
                    'nombre_cuidad'=>'required|min:4|max:20',
                    'direccion_adopcion'=>'required|min:20|max:50',
                    'fecha_adopcion'=>'required|date_format:Y-m-d',
                    'descripcion_adopcion'=>'required|min:5|max:600',
                ];
            }
            case "PUT":{
                return[
                    'select_usuario'=>'required|exists:usuario,id',
                    'select_mascota'=>'required|exists:mascota,id',
                    'nombre_cuidad'=>'required|min:4|max:20',
                    'direccion_adopcion'=>'required|min:20|max:50',
                    'fecha_adopcion'=>'required|date_format:Y-m-d',
                    'descripcion_adopcion'=>'required|min:5|max:600',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'select_usuario.required'=>'Este campo es obligatorio',
            'select_mascota.required'=>'Este campo es obligatorio',
            'nombre_cuidad.required'=>'Este campo es obligatorio',
            'direccion_adopcion.required'=>'Este campo es obligatorio',
            'fecha_adopcion.required'=>'Este campo es obligatorio',
            'descripcion_adopcion.required'=>'Este campo es obligatorio',

            'nombre_cuidad.min'=>'El campo debe tener mínimo :min caracteres.',
            'direccion_adopcion.min'=>'El campo debe tener mínimo :min caracteres.',
            'descripcion_adopcion.min'=>'El campo debe tener mínimo :min caracteres.',

            'nombre_cuidad.max'=>'El campo debe tener máximo :max caracteres.',
            'direccion_adopcion.max'=>'El campo debe tener máximo :max caracteres.',
            'descripcion_adopcion.max'=>'El campo debe tener máximo :max caracteres.',

            'fecha_adopcion' => 'El formato de fecha válido es dd-mm-AAAA.'
        ];
    }
}
