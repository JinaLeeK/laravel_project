<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Channle extends Model
{
   protected $fillable= ['title'];

   public function discussions() {
      return $this->hasMany('App\Discussion');
   }
    //
}
