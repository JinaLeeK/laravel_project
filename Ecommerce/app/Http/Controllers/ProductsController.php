<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Product;

class ProductsController extends Controller
{
   public function index() {
      return view('products.index', [
         'products' => Product::orderBy('created_at', 'desc')->get()
      ]);
   }

   public function show($id) {
      return view('products.show', ['p' => Product::find($id)] );

   }

   public function create() {
      return view('products.create');
   }

   public function store() {
      $r    = request();

      $attrs = [
         'name'   => 'required',
         'description'  => 'required',
         'image'        => 'required|image',
         'price'        => 'required'
      ];

      $this->validate($r, $attrs);

      $image = $r->image;
      $image_new_name = time().'_'.$image->getClientOriginalName();
      $image->move('uploads/products', $image_new_name);
      $r->image = 'uploads/products/'.$image_new_name;

      foreach(array_keys($attrs) as $attr) {
         $entry[$attr] = $r->$attr;
      }

      Product::create($entry);

      Session::flash('success', 'The product successfully created');

      return redirect()->route('products.index');
   }

   public function edit($id) {
      return view('products.edit', ['p'=>Product::find($id)]);
   }

   public function update($id) {
      $r       = request();
      $p       = Product::find($id);

      $attrs = [
         'name'   => 'required',
         'description'  => 'required',
         'price'        => 'required'
      ];

      $this->validate($r, $attrs);

      if( $r->hasFile('image') ) {
         if(file_exists($p->image)) {
            unlink($p->image);
         }
         $image = $r->image;
         $image_new_name = time().'_'.$image->getClientOriginalName();
         $image->move('uploads/products',$image_new_name);
         $r->image = 'uploads/products/'.$image_new_name;
         $attrs['image'] = '';
      }

      foreach(array_keys($attrs) as $attr) {
         $p->$attr = $r->$attr;
      }

      $p->save();

      return redirect()->route('products.show', ['id'=>$p->id]);

   }

   public function destroy($id) {
      $product = Product::find($id);


      if(file_exists($product->image)) {
         unlink( $product->image );
      }

      $product->delete();

      return redirect()->route('products.index');
   }
    //
}
