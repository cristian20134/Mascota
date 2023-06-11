<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonalidadRequest extends FormRequest
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
                    'personalidad_mascota' => 'required|min:5|max:10|alpha',
                ];
            }
            case "PUT":{
                return[
                    'personalidad_mascota' => 'required|min:5|max:10',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'personalidad_mascota.required'=>'Este campo es obligatorio.',
            'personalidad_mascota.min'=>'El campo debe tener minimo :min caracteres.',
            'personalidad_mascota.max'=>'El campo debe tener máximo :max caracteres.',
            'personalidad_mascota.alpha'=>'El campo solo debe contener letras.',

        ];
    }
}
