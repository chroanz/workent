<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function create()
    {
        return view('pages/profile/create');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|min:4',
            'birthday' => 'required',
            'address' => 'required|min:4'
        ]);

        $userId = Auth::id();
        $user = User::find($userId);
        if ($user->client != null) {
            return redirect()->route('profile.edit');
        }

        $formFields['user_id'] = $userId;
        Client::create($formFields);
        return redirect()->route('home');
    }

    public function edit()
    {
        $user = User::find(Auth::id());
        $client = $user->client;
        if ($client == null) {
            return redirect()->route('profile.create');
        }

        return view('pages/profile/edit', [
            'user' => $user,
            'client' => $client,
        ]);
    }

    public function update(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'address' => 'required|string|max:255',
        ]);

        $user = User::find(Auth::id());
        $client = $user->client;
        $client->update($formFields);

        return redirect()->route('profile.edit');
    }
}
