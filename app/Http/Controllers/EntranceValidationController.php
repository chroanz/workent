<?php

namespace App\Http\Controllers;

use App\Models\Rent;

class EntranceValidationController extends Controller
{
    public function show($rent_id)
    {
        $rent = Rent::findOrFail($rent_id);

        return view('pages/entrance-validation/show', [
            'rent' => $rent,
            'room' => $rent->room,
            'client' => $rent->client,
        ]);
    }

    public function validateEntrance($rent_id)
    {
        $validatedFields = request()->validate([
            'email' => 'required|email',
            'entrance_code' => 'required|string',
        ]);

        $rent = Rent::findOrFail($rent_id);

        $guest = $rent->guests->firstWhere('email', $validatedFields['email']);

        if ($guest && $guest->entrance_code === $validatedFields['entrance_code']) {

            return redirect()
                ->back()
                ->with('success', 'Entrada validada com sucesso.');
        }

        return redirect()
            ->back()
            ->with('failure', 'Código de entrada ou usuário inválidos.')
            ->withInput();
    }
}
