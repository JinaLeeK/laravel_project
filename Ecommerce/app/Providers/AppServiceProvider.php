<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      $condition = new \Darryldecode\Cart\CartCondition(array(
         'name' => 'VAT 12.5%',
         'type' => 'tax',
         'target' => 'subtotal', // this condition will be applied to cart's subtotal when getSubTotal() is called.
         'value' => '12.5%',
         'attributes' => array( // attributes field is optional
           'description' => 'Value added tax',
          )
      ));

      Cart::condition($condition);
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
