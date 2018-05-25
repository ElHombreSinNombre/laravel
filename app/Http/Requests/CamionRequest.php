<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Camion;

class CamionRequest extends FormRequest
{
 
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Camion::$rules;
    }

    public function messages()
    {
        return [
            'trk_in_date.required' => 'La fecha de inicio es obligatoria.',
            'trk_out_date.required' => 'La ficha de finalización es obligatoria',
        ];
    }

}
