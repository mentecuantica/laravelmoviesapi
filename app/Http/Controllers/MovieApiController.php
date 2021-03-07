<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieApiController extends Controller
{
    public function index() {
        return Movie::all();
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

    public function update(Post $post)
    {
        request()->validate([
            'title' => 'required',
            #'content' => 'required',
        ]);

        $success = $post->update([
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
