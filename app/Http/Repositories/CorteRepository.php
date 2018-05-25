<?php namespace App\Libraries\Repositories;

use App\Models\Corte;
use Illuminate\Support\Facades\Schema;

class CorteRepository
{

	public function all()
	{
		return Corte::all();
	}

	public function store($input)
	{
		return Corte::create($input);
	}
	 
	public function findcortesById($id)
	{
		return Corte::find($id);
	}

	public function update($corte, $input)
	{
		$corte = Corte::findOrFail($id);
        return $corte->fill($input)->save();
	}

	public function destroy($id)
	{
		$corte = Corte::findOrFail($id);
		return $corte->delete();
	}
	
}