<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    public function index()
    {
        // Deve retornar uma view de listagem um objeto nesse modelo para ser renderizado
        // return view('evaluation.index',[
        //     'evaluations' => Evaluation::all()
        // ]);
    }

    public function create()
    {
        // Deve retornar uma view de criação um objeto nesse modelo para ser renderizado
        return view('pages/evaluation/create');
    }

    public function store(Request $request)
    {
        // Deve receber os dados do formulário do método acima e criar um novo objeto nesse modelo
        $formFields = $request->validate([
            'comment' => 'string|max:255',
            'stars' => 'required|integer|min:1|max:5',
        ]);
        Evaluation::create($formFields);
        // Ao finalizar a criação, deve redirecionar para a uma página adequada
        return redirect('/');
    }

    public function show(Evaluation $evaluation)
    {
        // Deve retornar uma view de exibição de um objeto nesse modelo
        // return view('evaluation.show', [
        //     'evaluation' => $evaluation
        // ]);
    }

    public function edit(Evaluation $evaluation)
    {
        // Deve retornar uma view de edição de um objeto nesse modelo
        // return view('evaluation.edit', [
        //     'evaluation' => $evaluation
        // ]);
    }

    public function update(Request $request, Evaluation $evaluation)
    {
        // Deve receber os dados do formulário do método acima e atualizar o objeto nesse modelo
        // $formFields = $request->validate([
        //     'comment' => 'string|max:255',
        //     'stars' => 'required|integer|min:1|max:5',
        // ]);
        // $evaluation->update($formFields);
        // Ao finalizar a atualização, deve redirecionar para a uma página adequada
        // return redirect('/');
    }

    public function destroy(Evaluation $evaluation)
    {
        // Deve deletar o objeto nesse modelo
        // $evaluation->delete();
        // return redirect('/');
    }

    // Abaixo do destroy, você pode adicionar métodos adicionais que fogem do padrão do Laravel
}
