<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
//use Session;
class StripeController extends Controller
{
    public function index()
    {
        return view('stripe.index');
    }
 /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function handlePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100 * 150,
                "currency" => "ZAR",
                "source" => $request->stripeToken,
                "description" => "Making test payment." 
        ]);
  
        Session::flash('success', 'Payment has been successfully processed.');
          
        return back();
    }
    
}
