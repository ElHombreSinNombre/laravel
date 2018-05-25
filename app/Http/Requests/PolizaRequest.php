<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Poliza;

class PolizaRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Poliza::$rules;
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
        ];
    }

}
