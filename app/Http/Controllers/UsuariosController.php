<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Usuario;
use App\Models\Departamento;

//Request
use App\Http\Requests\UsuarioRequest;

//Repositories
use App\Repositories\UsuarioRepository;

//Facades
use Flash;
use Excel;
use Carbon;

//Datatable
use App\DataTables\UsuariosDataTable;


class UsuariosController extends Controller
{

    public function index(UsuariosDataTable $dataTable)
    {
        return $dataTable->render('moduloAdministracion.usuarios.listado');   
    }

    public function create()
    {
        return view('moduloAdministracion.usuarios.crear')->with($this->selects());
    }

    public function store(UsuarioRequest $request)
    {
        $input = $request->all();
        Usuario::create($input);
        flash('Usuario <b>'. $input['name'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }
    
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('moduloAdministracion.usuarios.editar')->with('usuario',$usuario)->with($this->selects());   
    }

    public function update(UsuarioRequest $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario -> fill($request->all());
        $usuario -> save();
        flash('<b>'.$usuario->name.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario -> delete();
        flash('<b>'. $usuario->name .'</b> eliminado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function informes()
    {
        $usuarios= Usuario::paginate(10);
        return view('moduloAdministracion.usuarios.informes')->with('usuarios',$usuarios);
    }

    public function excel()
    { 
        $usuarios = Usuario::all();
        Excel::create('Informes del '. Carbon::now()->format('d/m/Y'), function($excel) use ($usuarios) {
        $excel->setTitle('Lista del siniestro del '.Carbon::now()->format('d/m/Y'));
            $excel->sheet('Hoja 1', function($sheet) use ($usuarios){
                $sheet->appendRow(1, ['Usuario','Password','Departamento','Nombre','Apellido']);
                    foreach ($usuarios as $usuario){
                        $sheet->appendRow(
                            [
                                $usuario->user_name,          
                                $usuario->password, 
                                isset($usuario->departamento->name) ? $usuario->departamento->name :'',
                                $usuario->nombre,
                                $usuario->apellido,
                            ]
                        );
                    }
                });
        })->export('xls');
    }

    public function selects()
    {
        return[
            'nombreDepartamento' => Departamento::select('name','id')->orderBy('name','asc')->pluck('name','id')->prepend('', ''),
        ];
    }
    
}
