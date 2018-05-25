<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Priagelin;

class PriagelinRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Priagelin::$rules;
    }

    public function messages()
    {
        return [
            'modulo.required' => 'El módulo es obligatorio.',
            'cliente.required' => 'El cliente es obligatorio.',
            'buscar.required' => 'Buscar es obligatorio.',
        ];
    }
    
}
