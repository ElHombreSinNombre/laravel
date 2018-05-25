<?php

namespace App\Libraries\Repositories;


use App\Models\TrenDestino;
use Illuminate\Support\Facades\Schema;

class trendestinoRepository
{

	public function all()
	{
		return TrenDestino::all();
	}

	public function store($input)
	{
		return TrenDestino::create($input);
	}

	public function findTrenDestinoById($id)
	{
		return TrenDestino::find($id);
	}

	public function update($trendestino, $input)
	{
		$trendestino = TrenDestino::findOrFail($id);
        return $trendestino->fill($input)->save();
	}

	public function destroy($id)
	{
		$trendestino = TrenDestino::findOrFail($id);
		return $trendestino->delete();
	}
	
}