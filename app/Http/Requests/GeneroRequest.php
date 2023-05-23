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
                    'genero_mascota' => 'required|min:5|max:100',
                ];
            }
            case "PUT":{
                return[
                    'genero_mascota' => 'required|min:5|max:100',
                ];
            }
            
        }
        
    }

    public function messages(){   
        return [
            'genero_mascota.required'=>'Este campo es obligatorio',
        ];
    }
}
