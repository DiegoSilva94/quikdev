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
            'id' => $this->resource['id'],
            'poster' => $this->resource['poster_path'],
            'name' => $this->resource['title'],
            'overview' => $this->resource['overview'],
            'release_date' => $this->resource['release_date'],
            'genre' => $this->resource['genre_ids']
        ];
    }
}
