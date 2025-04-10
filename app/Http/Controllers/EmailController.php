<?php

namespace App\Http\Controllers;

use App\Mail\UserAccessEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendGuestAccessEmail(User $user)
    {
        Mail::to($user->email)->send(new UserAccessEmail($user));

        return response()->json([
            'message' => 'E-mail enviado com sucesso para ' . $user->email,
        ]);
    }

    public function sendQrCodeEmail(User $user)
    {
        //
    }
}
