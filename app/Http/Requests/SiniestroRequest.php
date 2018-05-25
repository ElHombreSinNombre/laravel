<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Siniestro;

class SiniestroRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return  Siniestro::$rules;
    }

    public function messages()
    {
        return [
            'estado.required' => 'El estado es obligatorio.',
            'codigo.required' => 'El código es obligatorio.',
        ];
    }

}
