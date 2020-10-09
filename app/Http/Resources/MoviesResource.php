<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MoviesResource extends ResourceCollection
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
            'data' => MovieResource::collection($this->collection['results']),
            'page' => $this->collection['page'],
            'total_pages' => $this->collection['total_pages'],
        ];
    }
}
