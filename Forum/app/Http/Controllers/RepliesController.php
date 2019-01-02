<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;

use App\Like;
use App\Reply;

class RepliesController extends Controller
{
   public function like($id) {

      Like::create([
         'reply_id'  => $id,
         'user_id'   => Auth::id()
      ]);

      Session::flash('success', 'You liked the reply.');

      return redirect()->back();
   }
    //
   public function unlike($id) {
      $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();
      $like->delete();

      Session::flash('success', 'You unliked the reply.');

      return redirect()->back();

   }

   public function best_answer($id) {
      $reply = Reply::find($id);
      $reply->best_answer = 1;
      $reply->save();

      $reply->user->points += 50;
      $reply->user->save();

      Session::flash('success','Reply has been marked as the best answer');
      return redirect()->back();
   }

   public function edit($id) {
      return view('replies.edit',['r'=>Reply::find($id)]);

   }

   public function update($id) {
      $r = request();
      $this->validate($r, [
         'content' => 'required'
      ]);

      $d = Reply::find($id);
      $d->content = $r->content;
      $d->save();

      return redirect()->route('discussion',["slug"=>$d->discussion->slug]);
   }

}
