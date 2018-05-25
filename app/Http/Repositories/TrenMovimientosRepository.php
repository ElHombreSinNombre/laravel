<?php namespace App\Libraries\Repositories;

use App\Models\TrenMovimiento;
use Illuminate\Support\Facades\Schema;

class TrenMovimientosRepository 
{

	public function all()
	{
		return TrenMovimiento::all();
	}

	public function store($input)
	{
		return TrenMovimiento::create($input);
	}

	public function findtrenmovimientosById($id)
	{
		return TrenMovimiento::find($id);
	}

	public function update($trenmovimiento, $input)
	{
		$trenmovimiento = TrenMovimiento::findOrFail($id);
        return $trenmovimiento->fill($input)->save();
	}

	public function destroy($id)
	{
		$trenmovimiento = TrenMovimiento::findOrFail($id);
		return $trenmovimiento->delete();
	}
	
}