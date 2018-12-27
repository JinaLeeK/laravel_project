<?php

namespace App\Http\Controllers;

use Session;
use Newsletter;

use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
use App\User;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
   public function index() {
      return view('index')
               ->with('title', Setting::first()->site_name)
               ->with('first_post', Post::orderBy('created_at','desc')->first())
               ->with('categories', Category::take(4)->get())
               ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
               ->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
               ->with('laravel', Category::find(1))
               ->with('css', Category::find(2))
               ->with('setting', Setting::first());
   }

   public function singlePost($slug) {
      $post = Post::where('slug',$slug)->first();

      $next_id = Post::where('id', '>', $post->id)->min('id');
      $prev_id = Post::where('id', '<', $post->id)->max('id');
      return view('post')
               ->with('title', $post->title)
               ->with('post', $post)
               ->with('categories', Category::take(4)->get())
               ->with('setting', Setting::first())
               ->with('tags', Tag::all())
               ->with('next', Post::find($next_id))
               ->with('prev', Post::find($prev_id));
   }

   public function category($id) {
      return view('category')
               ->with('title', Category::find($id)->name)
               ->with('categories', Category::take(4)->get())
               ->with('setting', Setting::first())
               ->with('category', Category::find($id))
               ->with('tags', Tag::all());

   }


   public function postsByUser($id) {
      $posts = Post::where('user_id',$id)->get();

      return view('posts_by_user')
               ->with('title', 'Posts By '.ucfirst(User::find($id)->name) )
               ->with('categories', Category::take(4)->get())
               ->with('setting', Setting::first())
               ->with('tags', Tag::all())
               ->with('posts', $posts);

   }

   public function tag($id) {
      return view('tag')
               ->with('title', Tag::find($id)->tag)
               ->with('categories', Category::take(4)->get())
               ->with('setting', Setting::first())
               ->with('tag', Tag::find($id))
               ->with('tags', Tag::all());

   }

   public function subscribe() {

      Newsletter::subscribe(request('email'));

      Session::flash('subscribe', 'Subscribed successfully');

      return redirect()->back();
   }
       //
}
