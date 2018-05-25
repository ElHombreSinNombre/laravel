<?php namespace App\Libraries\Repositories;

use App\Models\Parte;
use Illuminate\Support\Facades\Schema;

class ParteRepository
{

	public function all()
	{
		return Parte::all();
	}

	public function store($input)
	{
		return Parte::create($input);
	}

	public function findParteByID($id)
	{
		return Parte::find($id);
	}

	public function update($parte, $input)
	{
    	$parte = Parte::findOrFail($id);
        return $parte->fill($input)->save();
	}

	public function destroy($id)
	{
		$parte = Parte::findOrFail($id);
		return $parte->delete();
	}
	
}