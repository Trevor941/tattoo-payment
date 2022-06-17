<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\{Piercing, Tattoo};

class CartController extends Controller
{
    public function cart(){

return view('cart.index');
      //dd(session()->all());
      // Session::flush();
     }
 
     public function addToCart(Request $request, $id){

        $cartitem = Piercing::find($id);
    
      if(!$cartitem){
          abort(404);
      }
      //dd(session()->all());
      $cart = session()->get('cart');
      $cartarrayid = $request->id;
      //if cart is empty then this the first product
      if(!$cart){
          $cart = [
            $cartarrayid =>[
                  "id" => $request->id,
                  "name" => $request->name,
                  "price" => $request->price,
                  "quantity" => $request->quantity,
              ]
              ];
 
              session()->put('cart', $cart);
              $this->calculateTotalCart($request);
              return redirect()->route('cart')->with('addeditem', 'Product added to cart successfully!');
             }
 
          // if cart not empty then check if this product exist then increment quantity
             if(isset($cart[$cartarrayid])){
                 $cart[$cartarrayid]['quantity']++;
                 session()->put('cart', $cart);
                 $this->calculateTotalCart($request);
                 return redirect()->route('cart')->with('addeditem', 'Product added to cart successfully!');
             }
 
            // if item not exist in cart then add to cart with quantity = 1
             $cart[$cartarrayid] = [
                "id" => $request->id,
                "name" => $request->name,
                "price" => $request->price,
                "quantity" => $request->quantity,
             ];
             session()->put('cart', $cart);
             $this->calculateTotalCart($request);
             return redirect()->route('cart')->with('addeditem', 'Product added to cart successfully!');
          
      }
 
      function calculateTotalCart(Request $request){
         $cart = $request->session()->get('cart');
         $totalprice = 0;
         $totalquantity = 0;
         
 
         foreach($cart as $id=>$cartitem){
            $cartitem = $cart[$id];
             $price = $cartitem['price'];
             $quantity = $cartitem['quantity'];
             $totalprice = $totalprice + ($price * $quantity);
             $totalquantity =  $totalquantity + $quantity;
         }
 
         $request->session()->put('total', $totalprice);
         $request->session()->put('quantity', $totalquantity);
     }
 
     function updatecart(Request $request){
         if($request->session()->has('cart')){
             $product_id = $request->input('id');
             $product_quantity = $request->input('quantity');
 
             if($request->has('increaseproductquantity')){
                 $product_quantity = $product_quantity + 1;
             }else if($request->has('decreaseproductquantity')){
                 $product_quantity = $product_quantity - 1;
             }else{
 
             }
 
             $cart = $request->session()->get('cart');
             if(array_key_exists($product_id, $cart)){
                 $cart[$product_id]['quantity'] = $product_quantity;
                 $request->session()->put('cart', $cart);
                 $this->calculateTotalCart($request);
             }
         }
         return redirect()->back()->with('success', 'Cart updated successfully!');
     }
 
     function removefromcart(Request $request){
 
         if($request->session()->has('cart')){
             $id = $request->input('id');
             $cart = $request->session()->get('cart');
             unset($cart[$id]);
             $request->session()->put('cart', $cart);
             $this->calculateTotalCart($request);
 
         }
 
         return redirect()->back()->with('removeditem', 'Cart item deleted successfully!');
     }
}
