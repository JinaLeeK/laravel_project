<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

use App\Watcher;

class Discussion extends Model
{
   protected $fillable= ['title', 'content', 'user_id', 'channel_id', 'slug'];

   public function channel() {
      return $this->belongsTo('App\Channel');
   }

   public function user() {
      return $this->belongsTo('App\User');
   }

   public function replies() {
      return $this->hasMany('App\Reply');
   }

   public function watchers() {
      return $this->hasMany('App\Watcher');
   }

   public function is_being_watched_by_auth($id) {
      return Watcher::where('discussion_id',$id)
               ->where('user_id',Auth::id())
               ->count()
               > 0;
   }

   public function hasBestAnwer() {;
      return $this->replies->where('best_answer',1)->count()>0;
   }
    //
}
