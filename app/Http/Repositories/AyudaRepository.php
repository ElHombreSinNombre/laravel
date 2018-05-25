<?php namespace App\Libraries\Repositories;

use App\Models\Ayuda;
use Illuminate\Support\Facades\Schema;

class AyudaRepository
{

	public function all()
	{
		return Ayuda::all();
	}

	public function store($input)
	{
		return Ayuda::create($input);
	}
	 
	public function findcortesById($id)
	{
		return Ayuda::find($id);
	}

	public function update($ayuda, $input)
	{
		$ayuda = Ayuda::findOrFail($id);
        return $ayuda->fill($input)->save();
	}

	public function destroy($id)
	{
		$ayuda = Ayuda::findOrFail($id);
		return $ayuda->delete();
	}
	
}