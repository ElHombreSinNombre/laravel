<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Programador;

class ProgramadorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Programador::$rules;
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El codigo es obligatorio.',
        ];
    }
    
}
