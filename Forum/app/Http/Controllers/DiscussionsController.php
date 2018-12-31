<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;

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

      return redirect()->route('discuss',['slug'=>$discussion->slug]);
      // return view('discuss');
   }

   public function show($slug) {

      return view('discussions.show')
               ->with('discussion',Discussion::where('slug',$slug)->first());
   }

   public function reply($id) {
      $d = Discussion::find($id);
      $reply = Reply::create([
            'user_id'          => Auth::id(),
            'content'          => request()->content,
            'discussion_id'    => $id

      ]);

      return redirect()->back();
   }
   //
}
