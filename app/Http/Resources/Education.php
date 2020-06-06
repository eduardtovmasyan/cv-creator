<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Education extends JsonResource
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
            'name' => $this->name,
            'facultet' => $this->facultet,
            'place' => $this->place,
            'start' => $this->start,
            'end' => $this->end,
        ];
    }
}
