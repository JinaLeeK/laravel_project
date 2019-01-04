<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

use App\Product;

class CartController extends Controller
{
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

   public function checkout() {
      return view('checkout', ['products' => Cart::getContent(), 'total'=>Cart::getTotal() ]);
   }

   public function cart() {
      return view('cart', [
         'total_qty'    => Cart::getTotalQuantity(),
         'products'     => Cart::getContent(),
         'total_price'  => Cart::getTotal()
      ]);
   }

   public function remove($id) {
      Cart::remove($id);

      return redirect()->back();

   }

   public function destroy() {
      Cart::clear();

      return redirect()->route('shop');
   }

   public function edit() {
      return Cart::getContent()->toJson();
   }

    //
}
