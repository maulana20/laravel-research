<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'tblPlayer';
    protected $primaryKey = 'player_id';
}
