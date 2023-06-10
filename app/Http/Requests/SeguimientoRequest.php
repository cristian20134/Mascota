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
                    'estado_mascota'=>'required|min:5|max:20',
                    'fecha_seguimiento'=>'required|date_format:Y-m-d',
                    'descripcion_seguimiento'=>'required|min:5',
                ];
            }
            case "PUT":{
                return[
                    'select_seguimiento'=>'required|exists:adopcion,id',
                    'estado_mascota'=>'required',
                    'fecha_seguimiento'=>'required|date_format:Y-m-d',
                    'descripcion_seguimiento'=>'required|min:5',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'select_seguimiento'=>'Este campo es obligatorio',
            'estado_mascota'=>'Este campo es obligatorio',
            'fecha_seguimiento'=>'Este campo es obligatorio',
            'descripcion_seguimiento'=>'Este campo es obligatorio',

            'estado_mascota.min'=>'Los caracteres minimos son :min.'
        ];
    }
}
