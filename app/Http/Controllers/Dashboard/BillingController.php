<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillingController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {
        $invoices = Auth::user()->invoices();

        return view('dashboard.billing.index', compact('invoices'));
    }

    public function download(Request $request, $invoice, $price)
    {
        $plan =  Plan::where('stripe_price_id', $price)->first(); // get the plan of the invoice

        return $request->user()->downloadInvoice($invoice, [
            'vendor' => 'BOLD Inc.',
            // 'product' => auth()->user()->subscriptions(),
            'product' => $plan->name(),
        ]);
    }
}
