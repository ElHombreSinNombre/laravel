<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect; 

//Models
use App\Models\Libro;
use App\Models\Parametro;
use App\Models\Programador;
use App\Models\TipoProgramador;
use App\Models\PTNR;

//Request
use App\Http\Requests\LibroRequest;

//Repositories
use App\Repositories\LibroRepository;

//Facades
use Flash;

class LibrosController extends Controller
{
  
    public function index()
    {
        $libros=Parametro::where('modulo','PROGRAMADOR')->where('campo','ENVIO_LIBROS')->get();
        return view('moduloAdministracion.libros.general')->with('libros',$libros);
    }

    public function updateIndex(Request $request)
    {
        $libro=Parametro::findOrFail($request->id); 
        if ($libro->valor==0){
            $libro->valor=1;
        }else{
            $libro->valor=0;
        }
        $libro->save();
        flash('<b>Configuración de libros</b> modificado correctamente.', 'success')->important();
        return Redirect::back();
    }

    public function libros()
    {
        $libros=Libro::paginate(10);
		return view('moduloAdministracion.libros.libros')->with('libros',$libros);
    }

    public function edit ($id)
    {
        $libro=Libro::findOrFail($id);
        $programador=Programador::where('codigo',$libro->codigo)->paginate(10); 
        return view('moduloAdministracion.libros.editar')->with('libro',$libro)->with('programadores',$programador);
    }

    public function selects(){
        return [
            'descripcionProgramador' => TipoProgramador::select('descrip','id')->orderBy('descrip','asc')->pluck('descrip','id')->prepend('', '')
        ];
    }

    public function update(Request $request, $id)
    {
        $libro=Libro::findOrFail($id); 
        $libro -> fill($request->all());
        $libro -> save();
        flash('<b>'.$libro->codigo.'</b> modificado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function create(Request $request, $id)
    {
        $programador=Programador::findOrFail($request->id); 
        return view('moduloAdministracion.libros.crear')->with('programador',$programador)->with($this->selects());
    }

    public function store (LibroRequest $request)
    {
        $input = $request->all();
        Libro::create($input);
        flash('Libro <b>'. $input['codigo'].' </b>grabado de forma satisfactoria.', 'success');
        return Redirect::back();
    }

    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro -> delete();
        flash('<b>'. $libro->codigo .'</b> eliminado de forma satisfactoria.', 'success')->important();
        return Redirect::back();
    }

    public function cargar(){
        $dataSet = [];
        $contador = 0;
        $oraclelibros = PTNR::select('ENG_LNM, PTNR_CODE')->where('PTNR.PTNR_TYPE', 'SHA')->orderBy('ENG_LNM')->get();
        $libros = Libros::all()->toArray();
        foreach ($oraclelibros as $oraclelibro) {
            $trim = explode(' ', trim(strtolower($oraclelibro->eng_lnm)));
            $email = $trim[0].'@noatum.com';
            $encontrado = array_search($oraclelibro->eng_lnm, array_column($libros, 'nombre'));
            if ($encontrado === false) {
                $dataSet[] = [
                    'nombre' => $oraclelibro->eng_lnm,
                    'codigo' => $oraclelibro->ptnr_code,
                    'email' => $email,
                    'enviar' => 0,
                ];
                $contador++;
            }
        }
        Libros::insert($dataSet);
        if ($contador == 0) {
            flash('No se ha añadido ningún registro', 'error')->important();
        } else {
            flash('Se han cargado <b>'.$contador.'</b> nuevos registros', 'success')->important();
        }
        return Redirect::back();
    }

}
