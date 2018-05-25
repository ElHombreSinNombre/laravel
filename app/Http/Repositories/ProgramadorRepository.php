<?php namespace App\Libraries\Repositories;

use App\Models\Programador;
use Illuminate\Support\Facades\Schema;

class ProgramadorRepository
{

	public function all()
	{
		return Programador::all();
	}

	public function store($input)
	{
		return Programador::create($input);
	}

	 
	public function findLibrosById($id)
	{
		return Programador::find($id);
	}

	public function update($programador, $input)
	{
		$programador = Programador::findOrFail($id);
        return $programador->fill($input)->save();
	}

	public function destroy($id)
	{
		$programador = Programador::findOrFail($id);
		return $programador->delete();
	}
	
}