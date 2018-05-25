<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

//Modelo
use App\Models\Usuario;

//Facades
use Auth;

class PermisosComposer
{

    protected $users;

    public function __construct(Usuario $users)
    {
        $this->users = $users::with('departamento')->find(Auth::id());
    }

    public function compose(View $view)
    {
        $view->with('acceder', $this->users);
    }

}