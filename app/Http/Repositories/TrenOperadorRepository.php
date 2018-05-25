<?php namespace App\Libraries\Repositories;

use App\Models\TrenOperador;
use Illuminate\Support\Facades\Schema;

class TrenOperadorRepository
{

	public function all()
	{
		return TrenOperador::all();
	}

	public function store($input)
	{
		return TrenOperador::create($input);
	}

	public function findTrenOperadorById($id)
	{
		return TrenOperador::find($id);
	}

	public function update($trenoperador, $input)
	{
		$trenoperador = TrenOperador::findOrFail($id);
        return $trenoperador->fill($input)->save();
	}

	public function destroy($id)
	{
		$trenoperador = TrenOperador::findOrFail($id);
		return $trenoperador->delete();
	}
	
}