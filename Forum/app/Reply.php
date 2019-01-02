<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Reply extends Model
{
   protected $fillable = ['content', 'user_id', 'discussion_id'];


   public function discussion() {
      return $this->belongsTo('App\Discussion');
   }

   public function user() {
      return $this->belongsTo('App\user');
   }

   public function likes() {
      return $this->hasMany('App\Like');
   }

   public function is_liked_by_auth_user() {
      $id = Auth::id();

      foreach($this->likes as $like) {
         if($like->user->id == $id) return true;
      }

      return false;
   }

    //
}
