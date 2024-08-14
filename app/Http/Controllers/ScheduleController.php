<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateScheduleRequest;
use App\Http\Requests\UpdateScheduleRequest;
use App\Models\Movie;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function schedules()
    {
        $movies = Movie::all();
        return view('schedule/schedules', ['movies' => $movies]);
    }

    public function index($id)
    {
        $schedule = Schedule::whereId($id)->first();
        return view('schedule/index', ['schedule' => $schedule]);
    }

    public function create($id)
    {
        return view('schedule/create', ['movie_id' => $id]);
    }

    public function store(CreateScheduleRequest $request)
    {
        $schedule = new Schedule();
        $schedule->movie_id = $request->movie_id;
        $schedule->start_time = $request->start_time_date . ' ' . $request->start_time_time;
        $schedule->end_time = $request->end_time_date . ' ' . $request->end_time_time;
        $schedule->save();

        return redirect('/admin/movies/' . $request->movie_id);
    }

    public function edit($id)
    {
        return view('schedule/edit', ['schedule' => Schedule::whereId($id)->first()]);
    }

    public function update(UpdateScheduleRequest $request, $id)
    {
        $schedule = Schedule::whereId($id)->first();
        $schedule->start_time = $request->start_time_date . ' ' . $request->start_time_time;
        $schedule->end_time = $request->end_time_date . ' ' . $request->end_time_time;
        $schedule->save();

        return redirect('/admin/movies/' . $schedule->movie_id);
    }

    public function destroy($id)
    {
        $schedule = Schedule::whereId($id)->first();
        if (is_null($schedule)) {
            return response('', 404);
        }

        $schedule->delete();
        return redirect('/admin/schedules');
    }
}
