<?php namespace App\Libraries\Repositories;

use App\Models\Departamento;
use Illuminate\Support\Facades\Schema;

class DepartamentoRepository
{

	public function all()
	{
		return Departamento::all();
	}

	public function store($input)
	{
		return Departamento::create($input);
	}

	public function findDepartamentoByID($id)
	{
		return Departamento::find($id);
	}

	public function update($departamento, $input)
	{
    	$departamento = Departamento::findOrFail($id);
        return $departamento->fill($input)->save();
	}

	public function destroy($id)
	{
		$departamento = Departamento::findOrFail($id);
		return $departamento->delete();
	}
	
}