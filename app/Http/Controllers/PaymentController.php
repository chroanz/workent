<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    
    public function index ()
    {
        return Payment::all();
    }

    public function store ()
    {      
        $formFields = request()->validate([
            'price' => 'required|numeric|min:59.90',
            'payment_method' => 'required|string|in:credit_card,pix,debit_card',
            'room_id' => 'required|integer'
        ]);

        if(Payment::create($formFields)) {
            return redirect()->route('home');
        }
    }

}
