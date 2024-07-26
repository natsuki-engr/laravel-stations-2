<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies', ['movieList' => $movies]);
    }

    public function admin()
    {
        $movies = Movie::all();
        return view('movie/admin', ['movieList' => $movies]);
    }

    public function create()
    {
        return view('movie/create');
    }

    public function store(CreateMovieRequest $request)
    {
        $movie = new Movie();
        $movie->fill([
            "title" => $request->get('title'),
            "image_url" => $request->get('image_url'),
            "published_year" => $request->get('published_year'),
            "description" => $request->get('description'),
            "is_showing" => $request->get('is_showing', false),
        ])->save();

        return redirect('/admin/movies');
    }
}
