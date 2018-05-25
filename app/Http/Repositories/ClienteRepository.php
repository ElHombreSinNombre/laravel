<?php namespace App\Libraries\Repositories;

use App\Models\DepositoCliente;
use Illuminate\Support\Facades\Schema;

class ClienteRepository
{

	public function all()
	{
		return DepositoCliente::all();
	}

	public function store($input)
	{
		return DepositoCliente::create($input);
	}
	 
	public function findcortesById($id)
	{
		return DepositoCliente::find($id);
	}

	public function update($cliente, $input)
	{
		$cliente = DepositoCliente::findOrFail($id);
        return $cliente->fill($input)->save();
	}

	public function destroy($id)
	{
		$cliente = DepositoCliente::findOrFail($id);
		return $cliente->delete();
	}
	
}