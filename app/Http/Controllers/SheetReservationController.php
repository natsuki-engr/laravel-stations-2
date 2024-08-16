<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Models\Reservation;
use DB;
use Log;

class SheetReservationController
{
    public function store(CreateReservationRequest $request)
    {
        try {
            DB::beginTransaction();
            $exists = Reservation::where([
                'schedule_id' => $request->schedule_id,
                'sheet_id' => $request->sheet_id,
            ])->exists();
            if($exists) {
                return back()->withErrors(['error' => '予約済みです']);
            }
            $reservation = new Reservation();
            $reservation->schedule_id = $request->schedule_id;
            $reservation->sheet_id = $request->sheet_id;
            $reservation->name = $request->name;
            $reservation->email = $request->email;
            $reservation->date = $request->date;
            $reservation->save();
            DB::commit();
        } catch (\Throwable $e) {
            Log::error($e);
            DB::rollBack();
            return back()->withErrors(['error' => 'an error occurred']);
        }

        return redirect(route('movie.list'));
    }
}
