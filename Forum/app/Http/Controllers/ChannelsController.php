<?php

namespace App\Http\Controllers;

use App\Channel;

use Session;
use Illuminate\Http\Request;

class ChannelsController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */

   public function __construct() {
      $this->middleware('admin');
   }
   
   public function index()
   {
      return view('channels.index')->with('channels', Channel::all());

      //
   }

   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
   public function create()
   {
      return view('channels.create');
      //
   }

   /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
   public function store(Request $request)
   {
      $this->validate($request, [
         'title'  => 'required'
      ]);

      Channel::create([
         'title'  => $request->title,
         'slug'   => str_slug($request->title)
      ]);

      Session::flash('success', 'Channel created!');

      return redirect()->route('channels.index');
      //
   }

   /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function show($id)
   {
      //
   }

   /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function edit($id)
   {
      return view('channels.edit')->with('channel', Channel::find($id));
   }

   /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'title'  => 'required'
      ]);

      $channel = Channel::find($id);
      $channel->title = $request->title;
      $channel->slug = str_slug($request->title);
      $channel->save();

      Session::flash('success', 'Channel Updated!');

      return redirect()->route('channels.index');
      //
   }

   /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
   public function destroy($id)
   {
      $channel = Channel::find($id);

      foreach($channel->discussions as $discussion) {
         $discussion->delete();

         foreach($discussion->replies as $reply) {
            $reply->delete();
         }
      }

      $channel->delete();

      Session::flash('success', 'The channel deleted');

      return redirect()->route('channels.index');
      //
   }
}
