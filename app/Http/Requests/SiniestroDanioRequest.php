<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\SiniestroDanio;

class SiniestroDanioRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return SiniestroDanio::$rules;
    }

    public function messages()
    {
        return [
            'tipo_elemento_daniado_id.required' => 'El elemento dañado es obligatorio.',
        ];
    }
    
}
