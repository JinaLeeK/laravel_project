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

Route::get('/product/{id}', [
   'uses'   => 'FrontEndController@show',
   'as'     => 'product.show'
]);

Route::get('/checkout', [
   'uses'   => 'CartController@checkout',
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

   Route::post('edit', [
      'uses'   => 'CartController@edit',
      'as'     => 'cart.edit'
   ]);



});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([ 'middleware'=>'auth', 'prefix'=>'admin' ], function() {
   Route::resource('products', 'ProductsController');
});
