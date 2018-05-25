<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Corte;

class CorteRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Corte::$rules;
    }

    public function messages()
    {
        return [
            'descrip.required' => 'La descripción es obligatoria.',
            'f_comienzo.required' => 'La fecha de comienzo es obligatorio.',
            'f_final.required' => 'La fecha final es obligatoria.',
        ];
    }

}
