<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
	protected $table = 'tblGroup';
	
	public function getAccess($group_id)
	{
		$group_data = Group::where('group_id', '=', $group_id)->first();
		
		return $group_data->group_access;
	}
}
