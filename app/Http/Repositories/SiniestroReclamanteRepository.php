<?php namespace App\Libraries\Repositories;

use App\Models\SiniestroReclamante;
use Illuminate\Support\Facades\Schema;

class SiniestroReclamanteRepository
{

	public function all()
	{
		return SiniestroReclamanteRepository::all();
	}

	public function store($input)
	{
		return SiniestroReclamante::create($input);
	}

	public function findSiniestroReclamanteByID($id)
	{

		return SiniestroReclamante::find($id);
	}
	 
	public function update($siniestroReclamante, $input)
	{
		$siniestroReclamante = SiniestroReclamante::findOrFail($id);
        return $siniestroReclamante->fill($input)->save();
	}

	public function destroy($id)
	{
		$siniestroReclamante = SiniestroReclamante::findOrFail($id);
		return $siniestroReclamante->delete();
	}
	
}