<?php namespace App\Libraries\Repositories;

use App\Models\Camion;
use Illuminate\Support\Facades\Schema;

class CamionRepository
{

	public function all()
	{
		return Camion::all();
	}

	public function store($input)
	{
		return Camion::create($input);
	}
	 
	public function findcortesById($id)
	{
		return Camion::find($id);
	}

	public function update($camion, $input)
	{
		$camion = Camion::findOrFail($id);
        return $camion->fill($input)->save();
	}

	public function destroy($id)
	{
		$camion = Camion::findOrFail($id);
		return $camion->delete();
	}
	
}