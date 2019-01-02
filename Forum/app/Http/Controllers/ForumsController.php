<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

use App\Discussion;
use App\Channel;
use Auth;

class ForumsController extends Controller
{
   public function index() {

      switch( request('filter') ) {
         case 'me':
            $results = Discussion::where('user_id',Auth::id())->paginate(3);
         break;

         case 'solved':
            $answered = [];
            foreach(Discussion::all() as $d) {
               if($d->hasBestAnwer()) {
                  array_push($answered, $d);
               }
            }

            $results = new Paginator($answered, 3);
         break;

         case 'unsolved':
            $answered = [];
            foreach(Discussion::all() as $d) {
               if(!$d->hasBestAnwer()) {
                  array_push($answered, $d);
               }
            }

            $results = new Paginator($answered, 3);
         break;

         default:
            $results = Discussion::orderBy('created_at','desc')->paginate(3);
            break;
      }
      return view('forum',['discussions'=>$results]);
   }

   public function channel($slug) {
      $channel = Channel::where('slug',$slug)->first();
      $discussions = Discussion::where('channel_id',$channel->id)->orderBy('created_at','desc')->paginate(3);

      return view('channel', ['discussions'=>$discussions, 'c_slug'=>$slug]);
   }
    //
}
