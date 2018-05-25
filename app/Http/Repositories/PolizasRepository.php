<?php namespace App\Libraries\Repositories;

use App\Models\Poliza;
use Illuminate\Support\Facades\Schema;

class PolizasRepository
{

	public function all()
	{
		return Poliza::all();
	}

	public function store($input)
	{
		return Poliza::create($input);
	}

	public function findPolizaById($id)
	{
		return Poliza::find($id);
	}
	 
	public function update($poliza, $input)
	{
		$poliza = Poliza::findOrFail($id);
        return $poliza->fill($input)->save();
	}

	public function destroy($id)
	{
		$poliza = Poliza::findOrFail($id);
		return $poliza->delete();
	}
	
}