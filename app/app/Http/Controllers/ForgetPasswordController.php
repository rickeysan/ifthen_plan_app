<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;

class ForgetPasswordController extends Controller
{
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function index()
      {
         return view('auth.forgetPassword');
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function store(Request $request)
      {
          logger('ForgetPasswordControllerのstoreメソッドです');
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);

          $token = Str::random(64);

          \DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);
            Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Reset Password');
            });
            dd('fads');

          return back()->with('message', 'We have e-mailed your password reset link!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function show($token) {
        logger('ForgetPasswordControllerのshowメソッドです');
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
              'password' => 'required|string|min:6|confirmed',
              'password_confirmation' => 'required'
          ]);

          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email,
                                'token' => $request->token
                              ])
                              ->first();

          if(!$updatePassword){
              return back()->withInput()->with('error', 'Invalid token!');
          }

          $user = User::where('email', $request->email)
                      ->update(['password' => Hash::make($request->password)]);

          DB::table('password_resets')->where(['email'=> $request->email])->delete();

          return redirect('/login')->with('message', 'Your password has been changed!');
      }

}
