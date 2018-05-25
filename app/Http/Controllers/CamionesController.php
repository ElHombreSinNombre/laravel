<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Tara;

//Request
use App\Http\Requests\CamionRequest;

//Repositories
use App\Repositories\CamionRepository;

//Facade
use Helper;
use Carbon;
use Flash;

class CamionesController extends Controller
{

    public function index()
    {
        $contar=Tara::count();
        return view('moduloEstadistica.camiones.index')->with('contar',$contar);
    }
    
    public function store(CamionRequest $request)
    {
        Tara::truncate();
        $desde=Carbon::parse($request->trk_in_date)->format('Y-m-d H:i:s');
        $hasta=Carbon::parse($request->trk_out_date)->format('Y-m-d H:i:s');
        $helper = new Helper();
        $helper->insertar_camiones($desde,$hasta);
        flash('Se han insertado los'. Tara::count(). 'camiones que estaban entre <b>'. $desde. '</b> y <b>'.$hasta .'</b>.', 'success');
        return Redirect::back();
    }
    
}
