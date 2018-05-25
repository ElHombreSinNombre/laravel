<?php namespace App\Libraries\Repositories;

use App\Models\DepositoIntermediario;
use Illuminate\Support\Facades\Schema;

class IntermediarioRepository
{

	public function all()
	{
		return DepositoIntermediario::all();
	}

	public function store($input)
	{
		return DepositoIntermediario::create($input);
	}
	 
	public function findcortesById($id)
	{
		return DepositoIntermediario::find($id);
	}

	public function update($intermediario, $input)
	{
		$intermediario = DepositoIntermediario::findOrFail($id);
        return $intermediario->fill($input)->save();
	}

	public function destroy($id)
	{
		$intermediario = DepositoIntermediario::findOrFail($id);
		return $intermediario->delete();
	}
	
}