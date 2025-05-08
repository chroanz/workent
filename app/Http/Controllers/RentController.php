<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index()
    {
        $rents = Rent::with(['client', 'room', 'guests', 'payment', 'evaluation'])->get();
        return view('pages/admin/rent/index', compact('rents'));
    }

    public function show($rent_id)
    {
        $rent = Rent::findOrFail($rent_id);
        return view('pages/rent/show', compact('rent'));
    }

    public function create($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('pages/rent/create', compact('room'));
    }

    public function store($room_id)
    {
        $validated = request()->validate([
            'rentStart' => 'required|date',
            'rentEnd' => 'required|date|after:rentStart'
        ]);

        $clientId = User::findOrFail(Auth::id())->client->id;
        $validated['client_id'] = $clientId;
        $validated['room_id'] = $room_id;

        $rent = Rent::create($validated);
        return redirect()->route('payment.create', ['rent_id' => $rent->id]);
    }
}
