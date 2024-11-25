<?php

namespace App\Http\Controllers;

use App\Models\Vetiteseks;
use Illuminate\Http\Request;

class SeatsController extends Controller
{
    public function show($id)
    {
        $screening = Vetiteseks::findOrFail($id);
        $seats = $screening->seats;

        return view('seats.show', compact('screening', 'seats'));
    }

    public function reserve(Request $request)
    {
        $seatIds = $request->input('seat_ids');
        $screeningId = $request->input('screening_id');

        // Foglalás kezelése
    }
}
