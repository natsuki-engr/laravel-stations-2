<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use Illuminate\Http\Request;
use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $isShowing = $request->get('is_showing');
        $keyword = $request->get('keyword', '');
        $page = $request->get('page', '');

        $query = DB::table('movies');

        if ($isShowing === '0' || $isShowing === '1') {
            $query->where('is_showing', $isShowing);
        }

        if (strlen($keyword)) {
            $query->where(function ($q) use ($keyword) {
                $q->where('title', 'like', "%$keyword%")
                    ->orWhere('description', 'like', "%$keyword%");
            });
        }

        if(strlen($page)) {
            $query->offset(($page - 1) * 20);
            $query->limit(20);
        }

        $movies = $query->get();

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
