<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Elemento;

//Request
use App\Http\Requests\ElementoRequest;

//Repositories
use App\Repositories\ElementoRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\ElementosDaniadosDataTable;

class ElementosController extends Controller
{

    public function index(ElementosDaniadosDataTable $dataTable)
    {              
        return $dataTable->render('moduloSiniestros.elementosDaniados.listado',$this->selects());           
    }

    public function create()
    {
        return view('moduloSiniestros.elementosDaniados.crear')->with($this->selects());      
    }

    public function store(ElementoRequest $request)
    { 
        $input = $request->all();
        Elemento::create($input);
        flash('Elemento dañado <b>'. $input['nombre'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
 
    public function edit($id)
    {
        $elemento = Elemento::findOrFail($id);
        return view('moduloSiniestros.elementosDaniados.editar')->with('elemento',$elemento)->with($this->selects()); 
    }

    public function update(ElementoRequest $request, $id)
    {
        $elemento = Elemento::findOrFail($id);
        $elemento -> fill($request->all());
        $elemento -> save();
        flash('<b>'.$elemento->nombre.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $elemento = Elemento::findOrFail($id);
        $elemento -> delete();
        flash('<b>'. $elemento->nombre .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function selects()
    {
        return [    
            'nombreElemento'   => Elemento::select('nombre')->orderBy('nombre','asc')->pluck('nombre','nombre')->prepend('', ''),
        ];
    }

}
