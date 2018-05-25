<?php namespace App\Libraries\Repositories;

use App\Models\DepositoOperacion;
use Illuminate\Support\Facades\Schema;

class OperacionRepository
{

	public function all()
	{
		return DepositoOperacion::all();
	}

	public function store($input)
	{
		return DepositoOperacion::create($input);
	}
	 
	public function findcortesById($id)
	{
		return DepositoOperacion::find($id);
	}

	public function update($operacion, $input)
	{
		$operacion = DepositoOperacion::findOrFail($id);
        return $operacion->fill($input)->save();
	}

	public function destroy($id)
	{
		$operacion = DepositoOperacion::findOrFail($id);
		return $operacion->delete();
	}
	
}