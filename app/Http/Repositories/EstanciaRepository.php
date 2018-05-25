<?php namespace App\Libraries\Repositories;

use App\Models\EstanciaEmail;
use Illuminate\Support\Facades\Schema;

class EstanciaMailRepository
{

	public function all()
	{
		return EstanciaEmail::all();
	}

	public function store($input)
	{
		return EstanciaEmail::create($input);
	}

	 
	public function findLibrosById($id)
	{
		return EstanciaEmail::find($id);
	}

	public function update($estanciaEmail, $input)
	{
		$estanciaEmail = EstanciaEmail::findOrFail($id);
        return $estanciaEmail->fill($input)->save();
	}

	public function destroy($id)
	{
		$estanciaEmail = EstanciaEmail::findOrFail($id);
		return $estanciaEmail->delete();
	}
	
}