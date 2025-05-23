<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Support\Facades\DB;

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
            'rooms' => Room::simplePaginate(8),
        ]);
    }

    public function show(int $id)
    {
        $room = Room::findOrFail($id);

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
}
