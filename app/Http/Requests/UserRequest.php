<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Usuario;

class UserRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return User::$rules;
    }

    public function messages()
    {
        return [
            'user_name.required' => 'El nombre es obligatorio.',
            'password.required' => 'El password es obligatorio.',
        ];
    }

}
