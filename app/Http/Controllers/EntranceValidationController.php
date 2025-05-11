<?php

namespace App\Http\Controllers;

use App\Models\Rent;

class EntranceValidationController extends Controller
{
    public function show()
    {
        $rent_id = request('rent_id');
        $rent = Rent::findOrFail($rent_id);

        return view('pages/entrance-validation/show', [
            'rent' => $rent,
            'room' => $rent->room,
            'client' => $rent->client,
        ]);
    }

    public function validateEntrance()
    {
        $validatedFields = request()->validate([
            'email' => 'required|email',
            'entrance_code' => 'required|string',
        ]);
        $rent_id = request()->route('rent_id');
        $rent = Rent::findOrFail($rent_id);

        //fazer validação do email na lista de convidados e o código
        //requer Guest controller implementado
    }
}
