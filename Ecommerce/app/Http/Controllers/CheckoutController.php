<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Cart;

class CheckoutController extends Controller
{
   public function index() {
      return view('checkout');
   }

   public function payment() {
      \Stripe\Stripe::setApiKey("sk_test_byUOWe19Vz9FJETHOZ32xuiS");

      $charge = \Stripe\Charge::create([
          'amount'      => Cart::getTotal(),
          'currency'    => 'usd',
          'description' => 'Example charge',
          'source'      => request()->stripeToken,
      ]);

      Cart::destroy();

      Mail::to(reqest()->stripEmail)->send(new \App\Mail\PurchaseSucessful);

      return redirect()->route('shop');
   }
    //
}
