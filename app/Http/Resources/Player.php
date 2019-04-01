<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Player extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
		return [
			'player_id' => $this->player_id,
			'game_id' => $this->game_id,
			'player_name' => $this->player_name,
			'player_score' => $this->player_score,
			'player_status' => $this->player_status,
		];
		
        // return parent::toArray($request);
    }
}
