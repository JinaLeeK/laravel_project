<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class FrontEndController extends Controller
{
   public function index() {
      return view('index', ['products' => Product::paginate(12) ]);
   }

   public function show($id) {
      return view('product-detail', ['p'=>Product::find($id)]);
   }
    //
}
