<?php namespace App\Libraries\Repositories;

use App\Models\Propietario;
use Illuminate\Support\Facades\Schema;

class PropietarioRepository
{

	public function all()
	{
		return Propietario::all();
	}

	public function store($input)
	{
		return Propietario::create($input);
	}

	public function findPropietarioById($id)
	{
		return Propietario::find($id);
	}
	
	public function update($propietario, $input)
	{
		$propietario = Propietario::findOrFail($id);
        return $propietario->fill($input)->save();
	}

	public function destroy($id)
	{
		$propietario = Propietario::findOrFail($id);
		return $propietario->delete();
	}
	
}