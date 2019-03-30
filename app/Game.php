<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
	protected $table = 'tblGame';
    protected $primaryKey = 'game_id';
}
