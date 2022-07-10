<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
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
        if ($request->session()->has('cart')) {

            //creating new order
            $neworder = new Order();
            $neworder->orderno = 'Tattoo#Me' . rand(100000, 999999);
            $neworder->customername = $request->customername;
            $neworder->cardno = $request->cardno;
            $neworder->cvc = $request->cvc;
            $neworder->expirymonth = $request->expirymonth;
            $neworder->expiryyear = $request->expiryyear;
            $neworder->total = $request->session()->get('total');

            $neworder->save();

            $cart = $request->session()->get('cart');
            $cartitem_name = '';
            $order_id = 0;
           // $orderno = $neworder->orderno;
            foreach ($cart as $id => $cartitem) {
                $cartitem = $cart[$id];
                $cartitem_id = $cartitem['id'];
                $cartitem_name = $cartitem['name'];
                $cartitem_price = $cartitem['price'];
                $cartitem_quantity = $cartitem['quantity'];


                //creating order items
               // $order_id = $neworder->id;
                $neworderitem = new OrderItem();
                $neworderitem->order_id = $neworder->id;
                $neworderitem->cart_item_id = $cartitem_id;
                $neworderitem->name = $cartitem_name;
                $neworderitem->price = $cartitem_price;
                $neworderitem->quantity = $cartitem_quantity;

                $neworderitem->save();
                  
                
            }
            $user = User::where('id', 1)->first();

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            Stripe\Charge::create([
                "amount" => 100 * Session::get('total'),
                "currency" => "zar",
                "source" => $request->stripeToken,
                "description" => "Tattoo Payment" ."-" . "Order No " .  $neworder->orderno,
                "customer" => auth()->user()->name
            ]);

            Session::flush();
            return redirect('/dashboard')->with('message', 'Payment has been successfully processed.');
           // return $request->all();
        }
    }
}
