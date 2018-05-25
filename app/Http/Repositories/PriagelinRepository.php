<?php namespace App\Libraries\Repositories;

use App\Models\Priagelin;
use Illuminate\Support\Facades\Schema;

class PriagelinRepository 
{

	public function all()
	{
		return Priagelin::all();
	}

	public function store($input)
	{
		return Priagelin::create($input);
	}

	public function findpriagelinesById($id)
	{
		return Priagelin::find($id);
	}
	 
	public function update($priagelin, $input)
	{
		$priagelin = Priagelin::findOrFail($id);
        return $priagelin->fill($input)->save();
	}

	public function destroy($id)
	{
		$priagelin = Priagelin::findOrFail($id);
		return $priagelin->delete();
	}
	
}