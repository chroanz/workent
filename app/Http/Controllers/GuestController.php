<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
    }

    public function show(int $id)
    {
        $guest = Guest::findOrFail($id);
    }

    public function getAllByRent(int $rent_id)
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'user_id' => 'required|int'
        ]);

        Guest::create($validate);

        return redirect('/salas');
    }

    public function update(Request $request, Guest $guest)
    {
        //
    }

    public function destroy(Guest $guest)
    {
        //
    }
}
