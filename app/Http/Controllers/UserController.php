<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Type\Integer;

class UserController extends Controller
{
    public function index()
    {
        return view('pages/admin/users/index', [
            'users' => User::all(),
        ]);
    }

    public function create()
    {
        return view('pages/admin/users/create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'type' => 'required|string|in:admin,user',
        ]);

        $formFields['password'] = Hash::make($formFields['password']);

        User::create($formFields);

        return redirect()
            ->route('user.index')
            ->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('pages/admin/users/edit', [
            'user' => $user,
        ]);
    }

    public function update($user_id)
    {
        $user = User::findOrFail($user_id);

        $validatedFields = request()->validate([
            'email' => 'required|string|max:50',
            'type' => 'required|string|max:11',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $validatedFields['password'] = isset($validatedFields['password'])
            ? Hash::make($validatedFields['password'])
            : $user->password;

        $user->update($validatedFields);

        return redirect()
            ->route('user.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }
}
