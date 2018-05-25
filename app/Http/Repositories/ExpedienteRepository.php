<?php namespace App\Libraries\Repositories;

use App\Models\DepositoExpediente;
use Illuminate\Support\Facades\Schema;

class ExpedienteRepository
{

	public function all()
	{
		return DepositoExpediente::all();
	}

	public function store($input)
	{
		return DepositoExpediente::create($input);
	}
	 
	public function findcortesById($id)
	{
		return DepositoExpediente::find($id);
	}

	public function update($expediente, $input)
	{
		$expediente = DepositoExpediente::findOrFail($id);
        return $expediente->fill($input)->save();
	}

	public function destroy($id)
	{
		$expediente = DepositoExpediente::findOrFail($id);
		return $expediente->delete();
	}
	
}