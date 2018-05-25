<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DepositoExpediente;

class ExpedienteRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return DepositoExpediente::$rules;
    }

    public function messages()
    {
        return [
            'codigo.required' => 'El código es obligatorio.',
        ];
    }
    
}
