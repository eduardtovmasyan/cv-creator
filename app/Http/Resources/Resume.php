<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Resume extends JsonResource
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
            'surname' => $this->surname,
            'birthday' => $this->birthday,
            'email' => $this->email,
            'phone' => $this->phone,
            'skills' => Skill::collection($this->skills),
            'languages' => Language::collection($this->languages),
            'education' => Education::collection($this->educationEstablishments),
            'workExperience' => WorkExperience::collection($this->workPlaces),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
