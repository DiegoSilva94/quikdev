<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieDetailsResource;
use App\Http\Resources\MovieResource;
use App\Http\Resources\MoviesResource;
use App\Service\TMDBApi;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * @var TMDBApi
     */
    private $service;

    /**
     * MovieController constructor.
     */
    public function __construct()
    {
        $this->service = new TMDBApi();
    }

    /**
     * @return MoviesResource
     */
    public function index()
    {
        return MoviesResource::make($this->service->getMovies());
    }

    /**
     * @param int $id
     * @return MovieDetailsResource
     */
    public function show(int $id)
    {
        return MovieDetailsResource::make($this->service->getMovie($id));
    }
}
