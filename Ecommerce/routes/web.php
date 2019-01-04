<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [
   'uses'   => 'FrontEndController@index',
   'as'     => 'shop'
]);

Route::post('/cart/payment', [
   'uses'   => 'CheckoutController@payment',
   'as'     => 'cart.payment'
]);

Route::get('/product/{id}', [
   'uses'   => 'FrontEndController@show',
   'as'     => 'product.show'
]);

Route::get('/checkout', [
   'uses'   => 'CheckoutController@index',
   'as'     => 'checkout'
]);

Route::group(['prefix'=>'cart'], function() {

   Route::get('/', [
      'uses'   => 'CartController@cart',
      'as'     => 'cart'
   ]);


   Route::post('/add/{id}', [
      'uses'   => 'CartController@add',
      'as'     => 'cart.add'
   ]);

   Route::get('/remove/{id}', [
      'uses'   => 'CartController@remove',
      'as'     => 'cart.remove'
   ]);

   Route::get('/destroy', [
      'uses'   => 'CartController@destroy',
      'as'     => 'cart.destroy'
   ]);

   Route::get('edit/{id}/{qty}', [
      'uses'   => 'CartController@qty_update',
      'as'     => 'cart.qty.update'
   ]);



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware'=>'auth', 'prefix'=>'admin' ], function() {
   Route::resource('products', 'ProductsController');
});
