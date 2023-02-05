<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;
class StripeController extends Controller
{
    /**
     * payment view
     */
    public function handleGet()
    {
        return view('home');
    }

    public function handleGetModal()
    {
        return view('home2-modal');
    }

    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 200,
                "currency" => "USD",
                "source" => $request->stripeToken,
                "description" => "Making test payment."
        ]);

        // $charge = \Stripe\Charge::create([ ... ... ... ]);
        // dd($charge);

        Session::flash('success', 'Payment has been successfully processed.');

        return back();
    }
}
