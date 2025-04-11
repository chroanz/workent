<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        // Carrega os aluguéis com seus relacionamentos
        $rents = Rent::with(['client', 'room', 'guests', 'payment', 'evaluation'])->get();
        return response()->json($rents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'rentStart' => 'required|date',
            'rentEnd' => 'required|date|after:rentStart',
            'client_id' => 'required|exists:clients,id',
            'room_id' => 'required|exists:rooms,id'
        ]);

        // Cria o aluguel
        $rent = Rent::create($validated);
        return response()->json($rent, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Rent $rent): JsonResponse
    {
        // Carrega o aluguel com seus relacionamentos
        return response()->json($rent->load(['client', 'room', 'guests', 'payment', 'evaluation']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rent $rent): JsonResponse
    {
        // Valida os dados recebidos
        $validated = $request->validate([
            'rentStart' => 'sometimes|date',
            'rentEnd' => 'sometimes|date|after:rentStart',
            'client_id' => 'sometimes|exists:clients,id',
            'room_id' => 'sometimes|exists:rooms,id'
        ]);

        // Atualiza o aluguel
        $rent->update($validated);
        return response()->json($rent);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rent $rent): JsonResponse
    {
        $rent->delete();
        return response()->json(null, 204);
    }
}
