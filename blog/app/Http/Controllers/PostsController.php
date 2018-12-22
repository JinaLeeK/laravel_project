<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;

use Session;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.posts.index')->with('posts', Post::all());
        //
    }

    public function trashed() {
      $posts = Post::onlyTrashed()->get();
      return view('admin.posts.trashed')->with('posts', $posts);
   }

   public function kill($id) {
      $post = Post::withTrashed()->where('id',$id)->get()->first();
      $post->forceDelete();

      Session::flash('success', 'Post deleted permanantly');
      return redirect()->back();
   }

   public function restore($id) {
      $post = Post::withTrashed()->where('id',$id)->get()->first();
      $post->restore();

      Session::flash('success', 'Post restored successfully');
      return redirect()->route('posts');


   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $categories = Category::all();
      if($categories->count() == 0) {

         Session::flash('info','You must have some categories before attempting to create a post.');

         return redirect()->route('category.create');
      }

      $tags = Tag::all();
      if($tags->count() == 0) {

         Session::flash('info','You must have some tags before attempting to create a post.');

         return redirect()->route('tag.create');
      }

      return view('admin.posts.create')
               ->with('categories', Category::all())
               ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $aProperty = [
         'title'        => 'required|max:255',
         'featured'     => 'required|image',
         'content'      => 'required',
         'category_id'  => 'required'
      ];

      $this->validate($request, $aProperty);

      $featured = $request->featured;
      $featured_new_name = time().$featured->getClientOriginalName();
      $featured->move('uploads/posts', $featured_new_name);

      foreach( array_keys($aProperty) as $cName ) {
         if($cName == 'featured') {
            $aPost[$cName] = 'uploads/posts/'.$featured_new_name;
         } else {
            $aPost[$cName] = $request->$cName;
         }
      }

      $aPost['slug'] = str_slug($request->title);

      $post = Post::create($aPost);

      $post->tags()->attach($request->tags);

      Session::flash('success',' Post created successfully');
      return redirect()->route('posts');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return view('admin.posts.edit')
               ->with('post', Post::find($id))
               ->with('categories', Category::all())
               ->with('tags', Tag::all());
        //
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
         'title'        => 'required',
         'content'      => 'required',
         'category_id'  => 'required'
      ]);

      $post = Post::find($id);

      if($request->hasFile('featured')) {
         $featured = $request->featured;
         $featured_new_name = time().$featured->getClientOriginalName();
         $featured->move('uploads/posts', $featured_new_name);
         $post->featured = 'uploads/posts/'.$featured_new_name;
      }

      $post->title       = $request->title;
      $post->content     = $request->content;
      $post->category_id = $request->category_id;
      $post->save();

      $post->tags()->sync($request->tags);


      Session::flash('success', 'Post updated Successfully');

      return redirect()->route('posts');
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
      $post = Post::find($id);
      $post->delete();

      Session::flash('success', 'Te post was just trashed');
      return redirect()->back();
        //
    }
}
