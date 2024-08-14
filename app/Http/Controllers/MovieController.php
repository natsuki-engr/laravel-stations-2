<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    public function list(Request $request)
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

        if (strlen($page)) {
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
        $all = $request->all();
        try {
            DB::beginTransaction();

            $genre = Genre::whereName($request->get('genre'))
                ->first();

            if (is_null($genre)) {
                $genre = new Genre();
                $genre->fill([
                    "name" => $request->get('genre'),
                ])->save();
            }
            $genreId = $genre->id;

            $movie = new Movie();
            $movie->fill([
                "title" => $request->get('title'),
                "image_url" => $request->get('image_url'),
                "published_year" => $request->get('published_year'),
                "description" => $request->get('description'),
                "is_showing" => $request->get('is_showing', false),
                "genre_id" => $genreId,
            ])->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            throw $e;
        }

        return redirect('/admin/movies');
    }

    public function edit($id)
    {
        $movie = Movie::find($id);

        return view('movie/edit', ['movie' => $movie]);
    }

    public function update($id, UpdateMovieRequest $request)
    {
        try {
            DB::beginTransaction();

            $genre = Genre::whereName($request->get('genre'))
                ->first();
            if (is_null($genre)) {
                $genre = new Genre();
                $genre->fill([
                    "name" => $request->get('genre'),
                ])->save();
            }
            $genreId = $genre->id;

            Movie::where('id', $id)
                ->update([
                    "title" => $request->get('title'),
                    "image_url" => $request->get('image_url'),
                    "published_year" => $request->get('published_year'),
                    "description" => $request->get('description'),
                    "is_showing" => $request->get('is_showing', false),
                    "genre_id" => $genreId,
                ]);
            DB::commit();
        } catch (\Throwable $e) {
            DB::rollback();
            throw $e;
        }

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

    public function index($id)
    {
        $movie = Movie::whereId($id)->first();
        $schedules = Schedule::where('movie_id', $movie->id)
            ->orderBy('start_time')
            ->get();

        return view('movie/index', ['movie' => $movie, 'schedules' => $schedules]);
    }
}
