<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Room;

class PaymentController extends Controller
{

    public function index()
    {
        return Payment::all();
    }

    public function create($room_id)
    {
        $room = Room::findOrFail($room_id);
        return view('pages/payment/create', compact('room'));
    }

    public function store($room_id)
    {
        $formFields = request()->validate([
            'price' => 'required|numeric|min:59.90',
            'payment_method' => 'required|string|in:credit_card,pix,debit_card',
        ]);
        $formFields['room_id'] = $room_id;
        if (Payment::create($formFields)) {
            return redirect()->route('home');
        }
    }
}
