<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Rent;

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
            'price' => 'required|numeric|min:59.90',
            'payment_method' => 'required|string|in:credit_card,pix,debit_card',
        ]);

        $formFields['rent_id'] = $rent_id;
        if (Payment::create($formFields)) {
            return redirect()->route('home');
        }
    }
}
