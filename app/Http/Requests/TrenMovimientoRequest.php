<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\TrenMovimiento;

class TrenMovimientoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return TrenMovimiento::$rules;
    }

    public function messages()
    {
        return [
            'tipo_movimiento.required' => 'El tipo movimiento es obligatorio.',
        ];
    }
    
}
