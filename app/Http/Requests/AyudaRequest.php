<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Ayuda;

class AyudaRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Ayuda::$rules;
    }

    public function messages()
    {
        return [
            'ruta.required' => 'La ruta es obligatoria.',
            'modulo.required' => 'El módulo es obligatorio.',
            'grupo.required' => 'El grupo es obligatorio.',
            'opcion.required' => 'Una opción es obligatoria.',
        ];
    }

}
