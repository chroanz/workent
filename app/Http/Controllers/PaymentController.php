<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        return Payment::all();
    }

    public function create($rent_id)
    {
        $rent = Rent::findOrFail($rent_id);
        $room = $rent->room;
        return view('pages/payment/create', compact('room', 'rent'));
    }

    public function store($rent_id)
    {
        $formFields = request()->validate([
            'payment_method' => 'required|string|in:credit_card,pix,debit_card',
        ]);

        $formFields['rent_id'] = $rent_id;
        $formFields['price'] = Rent::findOrFail($rent_id)->room->price;

        if (Payment::create($formFields)) {
            return redirect()->route('home');
        }
    }
}
