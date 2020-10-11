<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MovieDetailsResource extends JsonResource
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
            'backdrop' => $this->resource['backdrop_path'],
            'name' => $this->resource['title'],
            'overview' => $this->resource['overview'],
            'tagline' => $this->resource['tagline'],
            'release_date' => $this->resource['release_date'],
            'vote_average' => $this->resource['vote_average'],
            'genres' => $this->resource['genres']
        ];
    }
}
