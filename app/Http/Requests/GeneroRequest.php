<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneroRequest extends FormRequest
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
                    'genero_mascota' => 'required|min:3|max:12|alpha',
                ];
            }
            case "PUT":{
                return[
                    'genero_mascota' => 'required|min:3|max:12|alpha',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'genero_mascota.required'=>'Este campo es obligatorio.',
            'genero_mascota.min'=>'El campo debe tener minimo :min caracteres.',
            'genero_mascota.max'=>'El campo debe tener máximo :max caracteres.',
            'genero_mascota.alpha'=>'El campo solo debe contener letras.',
        ];
    }
}
