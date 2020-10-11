<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieDetailsResource;
use App\Http\Resources\MoviesResource;
use App\Service\TMDBApi;

class MovieController extends Controller
{
    /**
     * @return MoviesResource
     * @throws \Exception
     */
    public function index()
    {
        return MoviesResource::make(TMDBApi::getMovies());
    }

    /**
     * @param int $id
     * @return MovieDetailsResource
     * @throws \Exception
     */
    public function show(int $id)
    {
        return MovieDetailsResource::make(TMDBApi::getMovie($id));
    }
}
