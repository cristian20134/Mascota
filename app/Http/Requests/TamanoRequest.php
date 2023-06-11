<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TamanoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        switch($this->method()){
            case "POST": {
                return[
                    'tamano_mascota' => 'required|min:5|max:15',
                ];
            }
            case "PUT":{
                return[
                    'tamano_mascota' => 'required|min:5|max:15',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'tamano_mascota.required'=>'Este campo es obligatorio',
            'tamano_mascota.min'=>'El campo debe tener mínimo :min caracteres.',
            'tamano_mascota.max'=>'El campo debe tener máximo :max caracteres.',
        ];
    }
}
