<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Request
use App\Http\Requests\TrenMovimientoRequest;

//Repositories
use App\Repositories\TrenMovimientoRepository;

//Models
use App\Models\TrenMovimiento;

//Facades
use Flash;

//Datatable
use App\DataTables\MovimientosDataTable;

class MovimientosController extends Controller
{
    
    public function index(MovimientosDataTable $dataTable)
    {                
        return $dataTable->render('moduloMovimientoTrenes.movimientos.listado');     
    }

    public function create()
    {
        return view('moduloMovimientoTrenes.movimientos.crear')->with($this->selects());      
    }

    public function store(TrenMovimientoRequest $request)
    {
        $input = $request->all();
        if ($request->fecha){
            $input['fecha']=Carbon::createFromFormat('d-m-Y',$request['fecha'])->format('Y-m-d');
        }
        TrenMovimiento::create($input);
        flash('Movimiento <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $movimiento = TrenMovimiento::findOrFail($id);
        return view('moduloMovimientoTrenes.movimientos.editar')->with('movimiento',$movimiento)->with($this->selects());     
    }

    public function update(TrenMovimientoRequest $request, $id)
    {
        $movimiento = TrenMovimiento::findOrFail($id);
        if ($request->fecha){
            $input['fecha']=Carbon::createFromFormat('d-m-Y',$request['fecha'])->format('Y-m-d');
        }
        $movimiento -> fill($request->all());
        $movimiento -> save();
        flash('<b>'.$movimiento->codigo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $movimiento = TrenMovimiento::findOrFail($id);
        $movimiento -> delete();
        flash('<b>'. $movimiento->codigo .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

       
    public function selects()
    {
        return [    
            'nombreMovimiento' => TrenMovimiento::select('operador','id')->orderBy('operador','asc')->pluck('operador','id')->prepend('', ''),
        ];
    } 

}
