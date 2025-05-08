<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function create()
    {
        return view('pages/evaluation/create');
    }

    public function store()
    {
        $formFields = request()->validate([
            'comment' => 'string|max:255',
            'stars' => 'required|integer|min:1|max:5',
        ]);
        Evaluation::create($formFields);
        return redirect('/');
    }
}
