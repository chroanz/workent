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
        $room = Room::with('images')->findOrFail($id);
        return view('pages.room.show', compact('room'));
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

        'image_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'image_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $room = Room::create([
        'name' => $validate['name'],
        'capacity' => $validate['capacity'],
        'price' => $validate['price'],
    ]);

    for ($i = 1; $i <= 3; $i++) {
        $imageField = 'image_' . $i;
        if (request()->hasFile($imageField)) {
            $path = request()->file($imageField)->store('rooms', 'public');

            $room->images()->create([
                'image_path' => $path,
            ]);
        }
    }

    return redirect('/salas')->with('success', 'Sala criada com sucesso!');
}

}
