<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\DepositoCliente;

//Request
use App\Http\Requests\ClienteRequest;

//Repositories
use App\Repositories\ClienteRepository;

//Facades
use Flash;

//Datatable
use App\DataTables\ClientesDataTable;

class ClientesController extends Controller
{

    public function index(ClientesDataTable $dataTable)
    {                
        return $dataTable->render('moduloDepositoAduanero.clientes.listado');     
    }

    public function create()
    {
        return view('moduloDepositoAduanero.clientes.crear');
    }

    public function store(ClienteRequest $request)
    {
        $input = $request->all();
        DepositoCliente::create($input);
        flash('Cliente <b>'. $input['nombre'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function edit($id)
    {
        $cliente=DepositoCliente::findOrFail($id);
        return view('moduloDepositoAduanero.clientes.editar')->with('cliente',$cliente);
    }

    public function update(ClienteRequest $request, $id)
    {
        $cliente = DepositoCliente::findOrFail($id);
        $cliente -> fill($request->all());
        $cliente -> save();
        flash('<b>'.$cliente->nombre.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $cliente = DepositoCliente::findOrFail($id);
        $cliente -> delete();
        flash('<b>'. $cliente->nombre .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
    
}
