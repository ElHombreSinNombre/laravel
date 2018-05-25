<?php namespace App\Libraries\Repositories;

use App\Models\Tablet;
use Illuminate\Support\Facades\Schema;

class TabletRepository
{

	public function all()
	{
		return Tablet::all();
	}


	public function store($input)
	{
		return Tablet::create($input);
	}

	public function findTabletById($id)
	{
		return Tablet::find($id);
	}

	public function update($tablet, $input)
	{
		$tablet = Tablet::findOrFail($id);
        return $tablet->fill($input)->save();
	}

	public function destroy($id)
	{
		$tablet = Tablet::findOrFail($id);
		return $tablet->delete();
	}
	
}