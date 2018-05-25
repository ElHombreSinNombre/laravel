<?php namespace App\Libraries\Repositories;

use App\Models\Elemento;
use Illuminate\Support\Facades\Schema;

class ElementoRepository
{

	public function all()
	{
		return Elemento::all();
	}

	public function store($input)
	{
		return Elemento::create($input);
	}

	public function findElementobyID($id)
	{
		return Elemento::find($id);
	}

	public function update($elemento, $input)
	{
		$elemento = Elemento::findOrFail($id);
        return $elemento->fill($input)->save();
	}

	public function destroy($id)
	{
		$elemento = Elemento::findOrFail($id);
		return $elemento->delete();
	}
	
}