<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Departamento;

class DepartamentoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Departamento::$rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
        ];
    }
    
}
