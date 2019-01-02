<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Notification;

use App\User;
use App\Reply;
use App\Discussion;

class DiscussionsController extends Controller
{
   public function create() {
      return view('discuss');
   }

   public function store() {

      $r = request();

      $this->validate($r, [
         'channel_id'   => 'required',
         'content'      => 'required',
         'title'        => 'required',

      ]);

      $discussion = [
         'user_id'      => Auth::id(),
         'title'        => $r->title,
         'slug'         => str_slug($r->title),
         'content'      => $r->content,
         'channel_id'   => $r->channel_id
      ];


      $discussion = Discussion::create($discussion);


      Session::flash('success', 'Successfully discussion created ');

      return redirect()->route('discussion',['slug'=>$discussion->slug]);
      // return view('discuss');
   }

   public function show($slug) {

      $discussion  = Discussion::where('slug',$slug)->first();

      $best_answer = $discussion->replies()->where('best_answer',1)->first();

      return view('discussions.show')
               ->with('discussion', $discussion)
               ->with('c_slug', $discussion->channel->slug)
               ->with('best_answer', $best_answer);
   }

   public function reply($id) {
      $d = Discussion::find($id);


      $reply = Reply::create([
            'user_id'          => Auth::id(),
            'content'          => request()->content,
            'discussion_id'    => $id

      ]);

      $reply->user->points += 25;
      $reply->user->save();

      $watchers = array();
      foreach($d->watchers as $watcher) {
         array_push($watchers, $watcher->user);
      }

      Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

      return redirect()->back();
   }

   public function best_answer($id) {
      $reply = Reply::find($id);

      $best_reply = $this->replies->where('best_answer',1)->first();
      if($best_reply) return $best_reply->id;
      else return false;
   }

   public function edit($id) {
      return view('discussions.edit')->with('d',Discussion::find($id));
   }

   public function update($id) {
      $r = request();
      $this->validate($r, [
         'content' => 'required'
      ]);

      $d = Discussion::find($id);
      $d->content = $r->content;
      $d->save();

      return redirect()->route('discussion',["slug"=>$d->slug]);
   }
   //
}
