<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TrenDestino;

class TrenDestinoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return TrenDestino::$rules;
    }

    public function messages()
    {
        return [
            'ciudad.required' => 'La ciudad es obligatoria.',
            'codigo.required' => 'El código es obligatorio.',
        ];
    }

}
