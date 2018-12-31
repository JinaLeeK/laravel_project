<?php

namespace App\Http\Controllers;

use SocialAuth;
use SocialNorm\Exceptions\ApplicationRejectedException;
use SocialNorm\Exceptions\InvalidAuthorizationCodeException;

use Auth;

use Session;

use Illuminate\Http\Request;

class SocialController extends Controller
{
   public function auth($provider) {
      return SocialAuth::authorize($provider);
   }

   public function auth_callback($provider) {
      SocialAuth::login($provider, function($user, $details) {
         $user->name = $details->nickname;
         $user->avatar = $details->avatar;
         $user->email = $details->email;
         $user->save();
      });
      Session::flash('success','Successfully loggedin');
      return redirect()->route('forum');

      // try {
      //    SocialAuth::login($provider, function($user, $details) {
      //       dd($details);
      //    });
      // } catch (ApplicationRejectedException $e) {
      //    Session::flash('danger', 'Login failed');
      //   // User rejected application
      //  } catch (InvalidAuthorizationCodeException $e) {
      //     Session::flash('danger', 'Login failed');
      //      // Authorization was attempted with invalid
      //      // code,likely forgery attempt
      //  }
      //
      // Session::flash('success', 'loggedin successfully');
      //  $user = Auth::user();
      //
      // return redirect()->route('home');

   }
    //
}
