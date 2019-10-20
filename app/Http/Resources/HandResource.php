<?php

namespace App\Http\Resources;

use App\HandPlayer;
use App\Round;
use Illuminate\Http\Resources\Json\JsonResource;

class HandResource extends JsonResource
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
            'id' => $this->id,
            'date' => $this->date,
            'isRealMoney' => $this->isRealMoney,
            'players' => new PlayerResource($this->players()),
            'rounds' => new RoundResource($this->rounds())
        ];
    }
}
