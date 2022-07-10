<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'        => $this->id,
            'age'       => $this->age,
            'name'      => $this->name,
            'breed'     => $this->breed,
            'birth'     => $this->birth,
            'weight'    => $this->weight,
            'picture'   => $this->picture,
        ];
    }
}
