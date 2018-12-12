<?php

namespace App\Http\Resources\Game_ssj2s;


use Illuminate\Http\Resources\Json\JsonResource;

class Game_ssj2sResource extends JsonResource
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
            'name' => $this -> name,
            'description' => $this -> description,
            'image' => $this -> image,
            'title' => $this -> title,
            'review' => $this -> review
        ];
    }
}
