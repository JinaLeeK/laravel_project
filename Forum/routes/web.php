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

   Route::get('discuss/create', [
      'uses'   => 'DiscussionsController@create',
      'as'     => 'discuss.create'
   ]);

   Route::post('discuss/store', [
      'uses'   => 'DiscussionsController@store',
      'as'     => 'discuss.store'
   ]);

   Route::get('discuss/{slug}', [
      'uses'   => 'DiscussionsController@show',
      'as'     => 'discussion'
   ]);

   Route::post('/discussion/reply/{id}', [
      'uses'   => 'DiscussionsController@reply',
      'as'     => 'discussion.reply'
   ]);

});
