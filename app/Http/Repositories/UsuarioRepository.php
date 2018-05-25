<?php namespace App\Libraries\Repositories;

use App\Models\Usuario;
use Illuminate\Support\Facades\Schema;

class UsuarioRepository 
{

	public function all()
	{
		return Usuario::all();
	}

	public function store($input)
	{
		return Usuario::create($input);
	}

	public function findUsuarioById($id)
	{
		return Usuario::findOrFail($id);
	}

	public function update($usuario, $input)
	{
		$usuario = Usuario::findOrFail($id);
        return $usuario->fill($input)->save();
	}

	public function destroy($id)
	{
		$usuario = Usuario::findOrFail($id);
		return $usuario->delete();
	}
	
}