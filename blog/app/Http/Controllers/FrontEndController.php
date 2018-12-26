<?php

namespace App\Http\Controllers;

use Session;

use App\Setting;
use App\Category;
use App\Post;

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
    //
}
