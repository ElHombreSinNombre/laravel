<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Reclamante;

class ReclamanteRequest extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Reclamante::$rules;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
        ];
    }

}
