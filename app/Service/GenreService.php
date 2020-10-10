<?php


namespace App\Service;


use App\Models\Genre;

class GenreService
{
    /**
     * @param $id
     * @return mixed
     */
    public static function find($id)
    {
        $model = Genre::find($id);
        if($model)
            return $model;
        self::updateGenres();
        $model = Genre::findOrFail($id);
        return $model;
    }

    /**
     * Update Genres
     */
    public static function updateGenres()
    {
        $genres = TMDBApi::getGenres();
        foreach ($genres['genres'] as $genre) {
            Genre::firstOrCreate(['id' => $genre['id']], ['name' => $genre['name']]);
        }
    }
}
