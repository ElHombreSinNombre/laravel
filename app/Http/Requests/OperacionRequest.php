<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\DepositoOperacion;

class OperacionRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return DepositoOperacion::$rules;
    }

    public function messages()
    {
        return [
            'tipo_operacion_id.required' => 'El tipo operación es obligatorio.',
        ];
    }

}
