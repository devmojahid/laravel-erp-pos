<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Stripe;

class StripePaymentController extends Controller
{
    public function showForm()
    {
        return view('payment-form');
    }

    public function processPayment(Request $request)
    {
        Stripe\Stripe::setApiKey(config('services.stripe.secret'));
        Stripe\Charge::create([
            "amount" => 100 * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from ErpSystem"
        ]);

        Session::flash('success', 'Payment has been successfully processed.');

        return redirect()->back();
    }
}
