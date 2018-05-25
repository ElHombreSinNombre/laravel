<?php namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Tablet;

class TabletRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Tablet::$rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
        ];
    }

}
