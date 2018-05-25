<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\EstanciaEmail;
use App\Models\Parametro;

//Request
use App\Http\Requests\EstanciaMailRequest;

//Repositories
use App\Repositories\EstanciaMailRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\EstanciasDatatable;

class EstanciasController extends Controller
{

    public function index()
    {
        $estancias=Parametro::where('modulo','ESTANCIAS')->where('campo','ENVIO_CORREO')->get();
        return view('moduloAdministracion.estancias.general')->with('estancias',$estancias);
    }

    public function create()
    {
        $estancias=Parametro::where('modulo','ESTANCIAS')->where('campo','!=','ENVIO_CORREO')->get();
        return view('moduloAdministracion.estancias.parametros')->with('estancias',$estancias);
    }

    public function correos()
    {
        $estancias_email=EstanciaEmail::paginate(10);
        return view('moduloAdministracion.estancias.correos')->with('estanciasEmail',$estancias_email);
    }

    public function updateCorreos(EstanciaMailRequest $request, $id)
    {
        $estancia = EstanciaEmail::findOrFail($id); 
        $estancia -> fill($request->all());
        $estancia -> save();
        flash('<b>Correos</b> grabados de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function update(Request $request, $id)
    {
        $estancia = Parametro::findOrFail($id); 
        if ($estancia->valor==0){
            $estancia->valor=1;
        }else{
            $estancia->valor=0;
        }
        $estancia -> save();
        flash('<b>'.$estancia->campo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function listado(Request $request,EstanciasDatatable $dataTable)
    {
        $mayor=Parametro::where('modulo','ESTANCIAS')->where('campo','like','%HASTA%')->pluck('valor','valor')->prepend('', '');
        if (!empty($request->all())){
            return $dataTable->render('moduloEstadistica.estancias.listado', ['mayor'=>$mayor, 'valores'=>$request->all()]);     
        }else{
            return view('moduloEstadistica.estancias.listado')->with('mayor',$mayor);
        }
    }

}
