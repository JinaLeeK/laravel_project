<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [
   'uses' => 'FrontEndController@index',
   'as'   => 'front_home'
]);

Route::get('/post/{slug}', [
   'uses' => 'FrontEndController@singlePost',
   'as'   => 'post'
]);

Route::get('/category/{id}', [
   'uses' => 'FrontEndController@category',
   'as'   => 'category'
]);

Route::get('/tag/{id}', [
   'uses' => 'FrontEndController@tag',
   'as'   => 'tag'
]);

Route::get('/user/{id}', [
   'uses' => 'FrontEndController@postsByUser',
   'as'   => 'author'
]);

Route::post('/subscribe', [
   'uses'   => 'FrontEndController@subscribe',
   'as'     => 'subscribe'
]);

Route::get('/results', function() {
   $posts = App\Post::where('title', 'like', '%'.request('query').'%')->get();

   return view('results')->with('posts', $posts)
                           ->with('title', 'Search results : '.request('query'))
                           ->with('categories', App\Category::take(4)->get())
                           ->with('setting', App\Setting::first())
                           ->with('tags', App\Tag::all());

});


Auth::routes();

Route::get('/test', function() {
   return App\User::find(1)->profile;
});

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function() {

   Route::get('/', [
      'uses' => 'HomeController@index',
      'as'   => 'dashboard'
   ]);

// post routes
   Route::get('/posts', [
      'uses'  => 'PostsController@index',
      'as'    => 'posts'
   ]);

   Route::get('/posts/trashed', [
      'uses'  => 'PostsController@trashed',
      'as'    => 'posts.trashed'
   ]);

   Route::get('/post/create', [
      'uses'   => 'PostsController@create',
      'as'     => 'post.create'
   ]);

   Route::get('/post/edit/{id}', [
      'uses'   => 'PostsController@edit',
      'as'     => 'post.edit'
   ]);

   Route::post('/post/update/{id}', [
      'uses'   => 'PostsController@update',
      'as'     => 'post.update'
   ]);

   Route::get('/post/delete/{id}', [
      'uses'   => 'PostsController@destroy',
      'as'     => 'post.delete'
   ]);

   Route::post('/post/store', [
      'uses'   => 'PostsController@store',
      'as'     => 'post.store'
   ]);

   Route::get('/post/kill/{id}', [
      'uses'   => 'PostsController@kill',
      'as'     => 'post.kill'
   ]);

   Route::get('/post/restore/{id}', [
      'uses'   => 'PostsController@restore',
      'as'     => 'post.restore'
   ]);


// category routes
   Route::get('/category/create', [
      'uses' => 'CategoriesController@create',
      'as'   => 'category.create'
   ]);

   Route::post('/category/store', [
      'uses' => 'CategoriesController@store',
      'as'   => 'category.store'
   ]);

   Route::get('/categories', [
      'uses' => 'CategoriesController@index',
      'as'   => 'categories'
   ]);

   Route::get('/category/edit/{id}', [
      'uses' => 'CategoriesController@edit',
      'as'   => 'category.edit'
   ]);

   Route::post('/category/update/{id}', [
      'uses' => 'CategoriesController@update',
      'as'   => 'category.update'
   ]);

   Route::get('/category/delete/{id}', [
      'uses' => 'CategoriesController@destroy',
      'as'   => 'category.delete'
   ]);


   Route::get('/tags', [
      'uses' => 'TagsController@index',
      'as'   => 'tags'
   ]);

   Route::get('/tag/create', [
      'uses' => 'TagsController@create',
      'as'   => 'tag.create'
   ]);

   Route::post('/tag/store', [
      'uses'   => 'TagsController@store',
      'as'     => 'tag.store'
   ]);


   Route::get('/tag/edit/{id}', [
      'uses' => 'TagsController@edit',
      'as'   => 'tag.edit'
   ]);

   Route::post('/tag/update/{id}', [
      'uses' => 'TagsController@update',
      'as'   => 'tag.update'
   ]);

   Route::get('/tag/delete/{id}', [
      'uses' => 'TagsController@destroy',
      'as'   => 'tag.delete'
   ]);

   // users routes
   Route::get('/users', [
      'uses'   => 'UsersController@index',
      'as'     => 'users'
   ]);

   Route::get('/user/create', [
      'uses'   => 'UsersController@create',
      'as'     => 'user.create'
   ]);

   Route::post('/user/store', [
      'uses'   => 'UsersController@store',
      'as'     => 'user.store'
   ]);

   Route::get('/user/admin/{id}', [
      'uses'   => 'UsersController@admin',
      'as'     => 'user.admin'
   ])->middleware('admin');

   Route::get('/user/delete/{id}', [
      'uses'   => 'UsersController@destroy',
      'as'     => 'user.delete'
   ]);

// profile route
   Route::get('/user/profile', [
      'uses'   => 'ProfilesController@index',
      'as'     => 'user.profile'
   ]);

   Route::post('/user/profile/update', [
      'uses'   => 'ProfilesController@update',
      'as'     => 'user.profile.update'
   ]);

   // Setting routes

   Route::get('/settings', [
      'uses'   => 'SettingsController@index',
      'as'     => 'settings'
   ]);

   Route::post('/setting/update', [
      'uses'   => 'SettingsController@update',
      'as'     => 'setting.update'
   ]);



});
