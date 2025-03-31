<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Registro de usuário
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $formFields['password'] = Hash::make($formFields['password']);
        $formFields['type'] = 'user';

        User::create($formFields);
        return redirect("/welcome");
    }

    // Login de usuário
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {  
            $request->session()->regenerate();
            return redirect('/');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }
    // Logout de usuário
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logout realizado com sucesso']);
    }
}
