<?php namespace App\Libraries\Repositories;

use App\Models\Siniestro;
use Illuminate\Support\Facades\Schema;

class SiniestrosRepository
{

	public function getAll()
	{
		return Siniestro::all();
	}

	public function store($input)
	{
		return Siniestro::create($input);
	}

	public function findByID($id)
	{
		return Siniestro::findOrFail($id);
	}

	public function update($siniestro, $input)
	{
		$siniestro = Siniestro::findOrFail($id);
        return $siniestro->fill($input)->save();
	}

	public function destroy($id)
	{
		$siniestro = Siniestro::findOrFail($id);
        return $siniestro->delete();
	}

}