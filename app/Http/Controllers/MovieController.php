<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
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

    public function edit($id)
    {
        return view('movie/edit', ['movie' => Movie::find($id)]);
    }

    public function update($id, UpdateMovieRequest $request)
    {
        $validated = $request->validated();
        Movie::where('id', $id)
            ->update($validated);

        return redirect('/admin/movies');
    }

    public function destroy($id)
    {
        $deleted = Movie::where('id', $id)->delete();
        if ($deleted) {
            return redirect('/admin/movies');
        } else {
            return response('Not Found', 404);
        }
    }
}
