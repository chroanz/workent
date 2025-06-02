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
        $request->validate([
            'name' => 'required|string',
            'birthday' => 'required|date|before_or_equal:today',
            'address' => 'required|string',
            'url_img' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            "name" => $request->name,
            "birthday" => $request->birthday,
            "address" => $request->address
        ];
        if ($request->hasFile('url_img')) {
            $path = $request->file('url_img')->store('profiles', 'public');
            $data["url_img"] = $path;
        }
        $userId = Auth::id();
        $user = User::find($userId);
        if ($user->client != null) {
            return redirect()->route('profile.edit');
        }

        $data['user_id'] = $userId;
        $client = Client::create($data);
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
            'name' => 'required|string|min:4|max:255',
            'birthday' => 'required|date|before_or_equal:today',
            'address' => 'required|string|min:4|max:255',
        ]);

        $user = User::find(Auth::id());
        $client = $user->client;
        $client->update($formFields);

        return redirect()->route('profile.edit');
    }
}
