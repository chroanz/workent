<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\Rent;

class EvaluationController extends Controller
{
    public function create($rent_id)
    {
        $rent = Rent::with(['payment', 'evaluation'])->findOrFail($rent_id);
        return view('pages/evaluation/create', compact('rent'));
    }

    public function store($rent_id)
    {
        $evaluation = request()->validate([
            'comment' => 'nullable|string|max:255',
            'stars' => 'required|integer|min:1|max:5',
        ]);
        $evaluation['rent_id'] = $rent_id;
        Evaluation::create($evaluation);
        return redirect()
            ->route('rent.show', $rent_id)
            ->with('success', 'Avaliação enviada com sucesso!');
    }
}
