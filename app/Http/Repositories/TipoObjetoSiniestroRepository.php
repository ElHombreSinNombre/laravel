<?php namespace App\Libraries\Repositories;

use App\Models\TipoObjetoSiniestro;
use Illuminate\Support\Facades\Schema;

class TipoObjetoSiniestroRepository
{

	public function all()
	{
		return TipoObjetoSiniestro::all();
	}

	public function store($input)
	{
		return TipoObjetoSiniestro::create($input);
	}
	 
	public function findObjetobyID($id)
	{
		return TipoObjetoSiniestro::find($id);
	}

	public function update($objeto, $input)
	{
		$objeto = TipoObjetoSiniestro::findOrFail($id);
        return $objeto->fill($input)->save();
	}

	public function destroy($id)
	{
		$objeto = TipoObjetoSiniestro::findOrFail($id);
		return $objeto->delete();
	}
	
}