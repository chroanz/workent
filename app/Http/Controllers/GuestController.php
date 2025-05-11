<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::all();
        return $guests;
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

        return redirect('/convidados');
    }

    public function update(Request $request, Guest $guest)
    {
        $validate = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|max:255',
            'user_id' => 'required|int'
        ]);

        Guest::update($validate);

        return response()->json(['message' => 'Convidado alterado com sucesso.']);
    }

    public function destroy(int $id)
    {
        $guest = Guest::delete($id);

        return response()->json(['message' => 'Convidado removido com sucesso.']);
    }
}
