<?php


namespace App\Service;

use Illuminate\Support\Facades\Http;

class TMDBApi
{
    /**
     * @return array|mixed
     */
    public static function getMovies()
    {
        $page = $_GET['page'] ?? 1;
        if(!isset($_GET['search']))
            return self::getPopularMovies($page);
        return self::getSearchMovies($_GET['search'], $page);
    }

    /**
     * @param int $page
     * @return array|mixed
     */
    protected static function getPopularMovies(int $page = 1)
    {
        $response = Http::get('https://api.themoviedb.org/3/movie/popular?api_key=' . env('TMDB_API_KEY') . '&language=en-US&page=' . $page);
        return $response->json();
    }

    /**
     * @param string $search
     * @param int $page
     * @return array|mixed
     */
    protected static function getSearchMovies(string $search,int $page = 1)
    {
        $response = Http::get('https://api.themoviedb.org/3/search/movie?api_key=' . env('TMDB_API_KEY') . '&language=en-US&include_adult=false&page=' . $page. '&query=' . $search);
        return $response->json();
    }

    /**
     * @param int $id
     * @return array|mixed
     */
    public static function getMovie(int $id)
    {
        $response = Http::get('https://api.themoviedb.org/3/movie/' . $id . '?api_key=' . env('TMDB_API_KEY') . '&language=en-US');
        return $response->json();
    }

    /**
     * @return array|mixed
     */
    public static function getGenres()
    {
        $response = Http::get('https://api.themoviedb.org/3/genre/movie/list?api_key=' . env('TMDB_API_KEY') . '&language=en-US');
        return $response->json();
    }
}
