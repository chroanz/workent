<?php

namespace App\Http\Controllers;

use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::simplePaginate(8);

        return view('pages/room/index', [
            'rooms' => $rooms
        ]);
    }

    public function adminIndex()
    {
        return view('pages/admin/room/index', [
            'rooms' => Room::simplePaginate(4),
        ]);
    }

    public function show(int $id)
    {
        $room = Room::findOrFail($id);

        return view('pages/room/show', compact('room'));
    }

    public function create()
    {
        return view('pages.admin.room.create');
    }

    public function store()
    {
        $validate = request()->validate([
            'name' => 'required|string|min:2|max:255',
            'capacity' => 'required|int|min:1',
            'price' => 'required|numeric|min:0.01',
        ]);

        Room::create($validate);

        return redirect('/salas');
    }
}
