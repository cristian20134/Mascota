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
                    'raza_mascota' => 'required|min:5|max:100',
                ];
            }
            case "PUT":{
                return[
                    'raza_mascota' => 'required|min:5|max:100',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'raza_mascota.required'=>'Este campo es obligatorio',
        ];
    }
}
