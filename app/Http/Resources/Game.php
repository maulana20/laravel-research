<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Game extends Resource
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
			'game_id' => $this->game_id,
			'game_name' => $this->game_name,
			'game_status' => $this->game_status,
		];
		
        // return parent::toArray($request);
    }
}
