<?php namespace App\Libraries\Repositories;

use App\Models\Reclamante;
use Illuminate\Support\Facades\Schema;

class ReclamantesRepository
{

	public function all()
	{
		return Reclamante::all();
	}

	public function store($input)
	{
		return Reclamante::create($input);
	}

	public function findReclamantebyID($id)
	{
		return Reclamante::find($id);
	}

	public function update($reclamante, $input)
	{
		$reclamante = Reclamante::findOrFail($id);
        return $reclamante->fill($input)->save();
	}

	public function destroy($id)
	{
		$reclamante = Reclamante::findOrFail($id);
		return $reclamante->delete();
	}
	
}