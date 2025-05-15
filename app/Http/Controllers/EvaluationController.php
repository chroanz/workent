<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Rent;

class EvaluationController extends Controller
{
    public function create($rentId)
    {
        $rent = Rent::findOrFail($rentId);
        $room = $rent->room;
        return view('pages/evaluation/create', compact('room', 'rent'));
    }

    public function store($rentId)
    {
        $formFields = request()->validate([
            'comment' => 'string|max:255',
            'stars' => 'required|integer|min:1|max:5',
        ]);

        $formFields['rent_id'] = $rentId;
        
        if (Evaluation::create($formFields)) {
            return redirect()->route('home');
        }

        return back()->withErrors('Erro ao criar a avaliação.');
    }
}
