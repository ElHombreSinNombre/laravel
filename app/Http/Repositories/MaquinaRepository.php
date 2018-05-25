<?php namespace App\Libraries\Repositories;

use App\Models\Maquina;
use Illuminate\Support\Facades\Schema;

class MaquinaRepository
{

	public function all()
	{
		return Maquina::all();
	}

	public function store($input)
	{
		return Maquina::create($input);
	}

	public function findMaquinaByID($id)
	{
		return Maquina::find($id);
	}

	public function update($maquina, $input)
	{
		$maquina = Maquina::findOrFail($id);
        return $maquina->fill($input)->save();
	}

	public function destroy($id)
	{
		$maquina = Maquina::findOrFail($id);
		return $maquina->delete();
	}
	
}