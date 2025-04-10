<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Client\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('pages.salas.salas', [
            'rooms' => $rooms
        ]);
    }

    public function show(int $id)
    {
        $room = Room::findOrFail($id);

        return view('pages.salas.detalhes', [
            'room' => $room
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|int',
            'price' => 'required|float'
        ]);

        Room::create($validate);

        return redirect('/salas');
    }
}