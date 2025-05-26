<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use App\Models\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::with(['rent.client'])->simplePaginate(6);

        return view('pages/admin/payment/index', [
            'payments' => $payments
        ]);
    }

    public function create($rent_id)
    {
        $rent = Rent::with('room')->findOrFail($rent_id);
        $daysRented = $this->calculateRentDays($rent);
        $totalPrice = $rent->room->price * $daysRented;
        return view('pages/payment/create', compact('rent', 'daysRented', 'totalPrice'));
    }

    public function store($rent_id)
    {
        $payment = request()->validate([
            'payment_method' => 'required|string|in:credit_card,pix,debit_card',
        ]);

        $payment['rent_id'] = $rent_id;

        $rent = Rent::with('room')->findOrFail($rent_id);
        $daysRented = $this->calculateRentDays($rent);
        $totalPrice = $rent->room->price * $daysRented;
        $payment['price'] = $totalPrice;

        Payment::create($payment);

        return redirect()->route('rent.index');
    }

    private function calculateRentDays(Rent $rent): int
    {
        return date_diff($rent->rentStart, $rent->rentEnd)->days + 1;
    }
}
