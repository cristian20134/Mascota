<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeguimientoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        switch($this->method()){
            case "POST": {
                return[
                    'select_seguimiento'=>'required|exists:adopcion,id',
                    'estado_mascota'=>'required|min:4|max:10',
                    'fecha_seguimiento'=>'required|date_format:Y-m-d',
                    'descripcion_seguimiento'=>'required|min:5|max:600',
                ];
            }
            case "PUT":{
                return[
                    'select_seguimiento'=>'required|exists:adopcion,id',
                    'estado_mascota'=>'required|min:4|max:10',
                    'fecha_seguimiento'=>'required|date_format:Y-m-d',
                    'descripcion_seguimiento'=>'required|min:5|max:600',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'select_seguimiento.required'=>'Este campo es obligatorio.',
            'estado_mascota.required'=>'Este campo es obligatorio.',
            'fecha_seguimiento.required'=>'Este campo es obligatorio.',
            'descripcion_seguimiento.required'=>'Este campo es obligatorio.',

            'estado_mascota.min'=>'El campo debe tener mínimo :min caracteres.',
            'descripcion_seguimiento.min'=>'El campo debe tener mínimo :min caracteres.',

            'estado_mascota.max'=>'El campo debe tener máximo :max caracteres.',
            'descripcion_seguimiento.max'=>'El campo debe tener máximo :max caracteres.',

            'fecha_seguimiento' => 'El formato de fecha válido es dd-mm-AAAA.'
        ];
    }
}
