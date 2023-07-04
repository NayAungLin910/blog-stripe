<?php

namespace App\Http\Controllers\Stripe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        return view('stripe.payments.index', [
            'intent' => auth()->user()->createSetupIntent(),
        ]);
    }

    public function store(Request $request)
    {
        
    }
}
