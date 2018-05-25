<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Visita;

class VisitaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Visita::$rules;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
        ];
    }
    
}
