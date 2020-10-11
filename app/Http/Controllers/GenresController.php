<?php

namespace App\Http\Controllers;

use App\Http\Resources\GenreResource;
use App\Models\Genre;
use App\Service\GenreService;

class GenresController extends Controller
{
    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return GenreResource::collection(GenreService::all());
    }

    /**
     * @param $id
     * @return GenreResource
     */
    public function show($id)
    {
        return GenreResource::make(GenreService::find($id));
    }
}
