<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function create()
    {
        return view('pages/auth/register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $formFields['password'] = Hash::make($formFields['password']);
        $formFields['type'] = 'user';

        User::create($formFields);
        return redirect()->route("auth.login");
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }

        $request->session()->regenerate();
        $user = User::find(Auth::id());
        return redirect()->route($user->client == null ? 'profile.create' : 'home');
    }

    public function login()
    {
        return view('pages/auth/login');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("auth.login");
    }
}
