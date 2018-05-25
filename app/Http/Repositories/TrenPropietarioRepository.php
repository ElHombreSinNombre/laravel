<?php namespace App\Libraries\Repositories;

use App\Models\TrenPropietario;
use Illuminate\Support\Facades\Schema;

class TrenPropietarioRepository
{

	public function all()
	{
		return TrenPropietario::all();
	}

	public function store($input)
	{
		return TrenPropietario::create($input);
	}

	public function findTrenPropietarioById($id)
	{
		return TrenPropietario::find($id);
	}

	public function update($trenpropietario, $input)
	{
		$trenpropietario = trenpropietario::findOrFail($id);
        return $trenpropietario->fill($input)->save();
	}

	public function destroy($id)
	{
		$trenpropietario = TrenPropietario::findOrFail($id);
		return $trenpropietario->delete();
	}
	
}