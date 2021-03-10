<?php

namespace App\Http\Controllers;

use App\Http\Resources\MovieCollection;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieApiController extends Controller
{
    public function index() {
        $orderBy = 'asc';
        if (request()->get('orderBy')) {
            $orderBy = request()->get('orderBy');
        }
        $movies = Movie::with('actors','genre');
        $actor = false;
        if (request()->get('actor')) {
            $actor = request()->get('actor');
        }

        $movies =Movie::with('actors','genre')->orderBy('title',$orderBy);
        if ($actor) {
            $movies = $movies->whereHas('actors',function ($query) use($actor) {
                $query->where('actor_name',$actor);
            });
        }
        $genre = false;
        if (request()->get('genre')) {
            $genre = request()->get('genre');
        }
        if ($genre) {
            $movies = $movies->whereHas('genre',function ($query) use($genre) {
                $query->where('title',$genre);
            });
        }
        return new MovieCollection($movies->get());


    }

    public function get(Movie $movie) {
        return $movie;
    }


    public function store()
    {
        request()->validate([
            'title' => 'required'
        ]);

        return Movie::create([
            'title' => request('title'),
            #'content' => request('content'),
        ]);
    }

    public function update(Movie $movie)
    {
        request()->validate([
            'title' => 'required',
            #'content' => 'required',
        ]);

        $success = $movie->update([
            'title' => request('title'),
            #'content' => request('content'),
        ]);

        return [
            'success' => $success
        ];
    }

    public function destroy(Movie $movie)
    {
        $success = $movie->delete();

        return [
            'success' => $success
        ];
    }
}
