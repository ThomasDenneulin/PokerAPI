<?php

namespace App\Http\Resources;

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
            'players' => new PlayerCollection($this->players()),
            'rounds' => new RoundCollection($this->rounds())
        ];
    }
}
