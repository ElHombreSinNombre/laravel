<?php namespace App\Libraries\Repositories;

use App\Models\Visita;
use Illuminate\Support\Facades\Schema;

class VisitaRepository
{

	public function all()
	{
		return Visita::all();
	}

	public function store($input)
	{
		return Visita::create($input);
	}

	public function findVisitaById($id)
	{
		return Visita::find($id);
	}

	public function update($visita, $input)
	{
		$visita = Visita::findOrFail($id);
        return $visita->fill($input)->save();
	}

	public function destroy($id)
	{
		$visita = Visita::findOrFail($id);
		return $visita->delete();
	}
	
}