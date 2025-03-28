<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function store(Request $request){

        $formFields = $request->validate([
            'email' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $formFields['password'] = Hash::make($formFields['password']);
        $formFields['type'] = 'user';

        User::create($formFields);
        return redirect("/welcome");
        // return response()->json(['user' => $user], 201);
    }

    public function login(Request $request){
         $request-> validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json(['message' => 'Credenciais inválidas'], 401);
        }

        $user = Auth::user();
        // $token = $user -> createToken('auth_tocken')->plainTexttoken;

        // return response()->json(['token' => $token, 'user' => $user]);
    }

    // Logout de usuário
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logout realizado com sucesso']);
    }

}

