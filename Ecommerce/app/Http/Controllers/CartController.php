<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

use App\Product;

class CartController extends Controller
{
   public function __contruct() {

   }

   public function add($id) {
      $product = Product::find($id);

      $cart_products = Cart::getContent();

      Cart::add(  $id,
                  $product->name,
                  $product->price,
                  request()->qty,
                  ['image' => asset($product->image)]
               );

      return redirect()->back();
   }

   public function cart() {
      return view('cart');
   }

   public function remove($id) {
      Cart::remove($id);

      return redirect()->back();

   }

   public function destroy() {
      Cart::clear();
      Cart::clearCartConditions();

      return redirect()->route('shop');
   }

   public function qty_update($id, $qty) {
      Cart::update($id, ['quantity'=>$qty]);

      return redirect()->back();
   }


    //
}
