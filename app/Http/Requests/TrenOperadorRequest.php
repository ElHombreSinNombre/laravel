<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TrenOperador;

class TrenOperadorRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return TrenOperador::$rules;
    }

    public function messages()
    {
        return [
            'operador.required' => 'El operador es obligatorio.',
            'codigo.required' => 'El código es obligatorio.',
        ];
    }

}
