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
                    'nombre_cuidad'=>'required',
                    'direccion_adopcion'=>'required|min:5|max:20',
                    'fecha_adopcion'=>'required|date_format:Y-m-d',
                    'descripcion_adopcion'=>'required|min:5',
                ];
            }
            case "PUT":{
                return[
                    'select_usuario'=>'required|exists:usuario,id',
                    'select_mascota'=>'required|exists:mascota,id',
                    'nombre_cuidad'=>'required',
                    'direccion_adopcion'=>'required|min:5|max:20',
                    'fecha_adopcion'=>'required|date_format:Y-m-d',
                    'descripcion_adopcion'=>'required|min:5',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'select_usuario'=>'Este campo es obligatorio',
            'select_mascota'=>'Este campo es obligatorio',
            'nombre_cuidad'=>'Este campo es obligatorio',
            'direccion_adopcion'=>'Este campo es obligatorio',
            'fecha_adopcion'=>'Este campo es obligatorio',
            'descripcion_adopcion'=>'Este campo es obligatorio',
        ];
    }
}
