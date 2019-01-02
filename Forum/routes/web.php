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
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/forum', [
   'uses'   => 'ForumsController@index',
   'as'     => 'forum'
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{provider}/auth', [
   'uses'   => 'SocialController@auth',
   'as'     => 'social.auth'
]);

Route::get('/{provider}/redirect', [
   'uses'   => 'SocialController@auth_callback',
   'as'     => 'social.callback'
]);

Route::group(['middleware'=>'auth'], function() {

   Route::resource('channels', 'ChannelsController');

   Route::get('discuss/create/new', [
      'uses'   => 'DiscussionsController@create',
      'as'     => 'discuss.create'
   ]);

   Route::post('discuss/store', [
      'uses'   => 'DiscussionsController@store',
      'as'     => 'discuss.store'
   ]);


   Route::get('/discussion/edit/{id}', [
      'uses'   => 'DiscussionsController@edit',
      'as'     => 'discussion.edit'
   ]);

   Route::post('/discussion/update/{id}', [
      'uses'   => 'DiscussionsController@update',
      'as'     => 'discussion.update'
   ]);

   Route::get('/discussion/watch/{id}', [
      'uses'   => 'WatchersController@watch',
      'as'     => 'discussion.watch'
   ]);

   Route::get('/discussion/unwatch/{id}', [
      'uses'   => 'WatchersController@unwatch',
      'as'     => 'discussion.unwatch'
   ]);

   Route::post('/discussion/reply/{id}', [
      'uses'   => 'DiscussionsController@reply',
      'as'     => 'discussion.reply'
   ]);

   Route::get('/reply/like/{id}', [
      'uses'   => 'RepliesController@like',
      'as'     => 'reply.like'
   ]);

   Route::get('/reply/unlike/{id}', [
      'uses'   => 'RepliesController@unlike',
      'as'     => 'reply.unlike'
   ]);

   Route::get('/reply/edit/{id}', [
      'uses'   => 'RepliesController@edit',
      'as'     => 'reply.edit'
   ]);

   Route::post('/reply/update/{id}', [
      'uses'   => 'RepliesController@update',
      'as'     => 'reply.update'
   ]);


   Route::get('/discussion/best/reply/{id}', [
      'uses'   => 'RepliesController@best_answer',
      'as'     => 'reply.best.answer'
   ]);

});

Route::get('discuss/{slug}', [
   'uses'   => 'DiscussionsController@show',
   'as'     => 'discussion'
]);

Route::get('channel/{slug}', [
   'uses'   => 'ForumsController@channel',
   'as'     => 'channel.forum'
]);
