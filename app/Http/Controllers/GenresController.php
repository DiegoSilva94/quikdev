<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Service\GenreService;

class GenresController extends Controller
{
    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        return GenreResource::make(GenreService::find($id));
    }
}
