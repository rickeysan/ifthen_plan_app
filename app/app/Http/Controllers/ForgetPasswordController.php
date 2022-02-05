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
            session()->flash('toastr', config('toastr.reset-email__send'));

          return back()->with('message', 'We have e-mailed your password reset link!');
      }

}
