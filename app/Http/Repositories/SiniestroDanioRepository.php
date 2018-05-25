<?php namespace App\Libraries\Repositories;

use App\Models\SiniestroDanio;
use Illuminate\Support\Facades\Schema;

class SiniestroDanioRepository
{

	public function all()
	{
		return SiniestroDanio::all();
	}

	public function store($input)
	{
		return SiniestroDanio::create($input);
	}

	public function findDanioById($id)
	{
		return SiniestroDanio::find($id);
	}

	public function update($siniestroDanio, $input)
	{
		$siniestroDanio = SiniestroDanio::findOrFail($id);
        return $siniestroDanio->fill($input)->save();
	}

	public function destroy($id)
	{
		$siniestroDanio = SiniestroDanio::findOrFail($id);
		return $siniestroDanio->delete();
	}
	
}