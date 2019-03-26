<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table = 'tblProfile';
	protected $primaryKey = 'profile_code';
}
