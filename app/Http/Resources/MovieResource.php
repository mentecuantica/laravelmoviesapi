<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'id'=>$this->id,
            'genre'=>$this->genre,
            'title'=>$this->title,
            'actors'=>$this->actors,
        ];
    }
}
