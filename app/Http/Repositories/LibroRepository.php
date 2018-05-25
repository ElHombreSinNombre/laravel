<?php namespace App\Libraries\Repositories;

use App\Models\Libro;
use Illuminate\Support\Facades\Schema;

class LibroRepository
{

	public function all()
	{
		return Libro::all();
	}

	public function store($input)
	{
		return Libro::create($input);
	}

	public function findLibrosById($id)
	{
		return Libro::find($id);
	}

	public function update($libro, $input)
	{
		$libro = Libro::findOrFail($id);
        return $libro->fill($input)->save();
	}

	public function destroy($id)
	{
		$libro = Libro::findOrFail($id);
		return $libro->delete();
	}
	
}