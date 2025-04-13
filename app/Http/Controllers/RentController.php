<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Carrega os aluguéis com seus relacionamentos
        $rents = Rent::with(['client', 'room', 'guests', 'payment', 'evaluation'])->get();
        return view('pages.admin.rent.index', compact('rents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'rentStart' => 'required|date',
            'rentEnd' => 'required|date|after:rentStart',
            'room_id' => 'required|exists:rooms,id'
        ]);

        // TODO: Adicionar client_id do usuário logado
        
        // Cria o aluguel
        $rent = Rent::create($validated);
        return redirect()->route('admin.rent.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent)
    {
        // Carrega o aluguel com seus relacionamentos
        $rent->load(['client', 'room', 'guests', 'payment', 'evaluation']);
        return view('pages.rent.show', compact('rent'));
    }
}
