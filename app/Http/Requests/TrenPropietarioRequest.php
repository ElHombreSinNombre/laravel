<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TrenPropietario;

class TrenPropietarioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return TrenPropietario::$rules;
    }

    public function messages()
    {
        return [
            'propietario.required' => 'El propietario es obligatorio.',
            'codigo.required' => 'El código es obligatorio.',
        ];
    }

}
