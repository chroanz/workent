<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Rent;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());

        if (!$user->isAdmin()) {
            $clientId = $user->client->id;
            $rents = Rent::with(['client', 'room', 'payment', 'evaluation'])
                ->where('client_id', $clientId)
                ->get();

            return view('pages/rent/index', compact('rents'));
        }

        $rents = Rent::with(['client', 'room', 'payment', 'evaluation'])->simplePaginate(8);
        return view('pages/admin/rent/index', compact('rents'));
    }

    public function show($rent_id)
    {
        $rent = Rent::with('payment', 'guests')->findOrFail($rent_id);
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
            'rentStart' => 'required|date|after_or_equal:today',
            'rentEnd' => 'required|date|after_or_equal:rentStart',
            'guests' => 'nullable|array',
            'guests.*.name' => 'nullable|string|max:255',
            'guests.*.email' => 'nullable|email',
        ]);

        $guests = array_filter($validated['guests'] ?? [], function ($guest) {
            return !empty($guest['name']) && !empty($guest['email']);
        });
        unset($validated['guests']);

        $clientId = User::findOrFail(Auth::id())->client->id;
        $validated['client_id'] = $clientId;
        $validated['room_id'] = $room_id;

        $rent = Rent::create($validated);

        if (!empty($guests)) {
            for ($i = 0; $i < sizeof($guests); $i++) {
                $guests[$i]['rent_id'] = $rent->id;
                $guests[$i]['entrance_code'] = "entrance_code";
            }
            Guest::insert($guests);
        }
        return redirect()->route('payment.create', ['rent_id' => $rent->id]);
    }
}
