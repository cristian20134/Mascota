<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RazaRequest extends FormRequest
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
                    'raza_mascota' => 'required|min:3|max:15',
                ];
            }
            case "PUT":{
                return[
                    'raza_mascota' => 'required|min:3|max:15',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'raza_mascota.required'=>'Este campo es obligatorio.',
            'raza_mascota.min'=>'El campo debe tener minimo :min caracteres.',
            'raza_mascota.max'=>'El campo debe tener máximo :max caracteres.',
        ];
    }
}
