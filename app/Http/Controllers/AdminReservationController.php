<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdminReservationRequest;
use App\Http\Requests\UpdateAdminReservationRequest;
use App\Models\Reservation;

class AdminReservationController
{
    public function list()
    {
        $reservations = Reservation::where("date", ">=", date("Y-m-d"))->get();
        return view('admin/reservations', ['reservations' => $reservations]);
    }

    public function create()
    {
        # code...
    }

    public function store(CreateAdminReservationRequest $request)
    {
        $reservation = new Reservation();
        $reservation->schedule_id = $request->get('schedule_id');
        $reservation->sheet_id = $request->get('sheet_id');
        $reservation->name = $request->get('name');
        $reservation->email = $request->get('email');
        $reservation->date = date('Y-m-d');
        $reservation->save();

        return redirect(route('admin.reservations'));
    }

    public function edit($id)
    {
        return view('admin/reservation-edit', ['reservation' => Reservation::find($id)]);
    }

    public function update($id, UpdateAdminReservationRequest $request)
    {
        Reservation::where(['id' => $id])->update([
            'schedule_id' => $request->get('schedule_id'),
            'sheet_id' => $request->get('sheet_id'),
            'name' => $request->get('name'),
            'email' => $request->get('email'),
        ]);

        return redirect(route('admin.reservations'));
    }

    public function delete($id)
    {
        $count = Reservation::destroy($id);
        if($count === 0) {
            return response('Given id does not exists', 404);
        }

        return redirect(route('admin.reservations'));
    }
}
