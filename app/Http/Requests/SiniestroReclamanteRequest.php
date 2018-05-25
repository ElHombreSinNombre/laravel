<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SiniestroReclamante;

class SiniestroReclamanteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return SiniestroReclamante::$rules;
    }

    public function messages()
    {
        return [
            'reclamante_id.required' => 'El reclamante es obligatorio.',
        ];
    }
    
}
