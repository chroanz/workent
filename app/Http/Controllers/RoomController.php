<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::all();

        return view('pages/room/index', [
            'rooms' => $rooms
        ]);
    }

    public function show(int $id)
    {
        $room = Room::with('rents')->findOrFail($id);

        return view('pages/room/show', compact('room'));
    }

    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|string|max:255',
            'capacity' => 'required|int',
            'price' => 'required|float'
        ]);

        Room::create($validate);

        return redirect('/salas');
    }

    public function adminIndex()
    {
        $rooms = Room::all();
        return view('pages/admin/room/index', [
            'rooms' => $rooms
        ]);
    }
    public function create()
    {
        return view('pages/admin/room/create');
    }
}
