<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use Hash;
use DB;
use App\Http\Requests\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function show($token) {
        logger('ResetPasswordControllerのshowメソッドです');
        return view('auth.forgetPasswordLink', ['token' => $token]);
    }

    public function store(ResetPasswordRequest $request){
        logger('ResetPasswordControllerのstoreメソッドです');
        dd('fdsa');
        $updatePassword = DB::table('password_resets')
            ->where([
                'email' => $request->email,
                'token' => $request->token
                ])
            ->first();
        if(!$updatePassword){
            return back()->withInput()->with('error', '不正なフォームです');
        }
        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
        session()->flash('toastr', config('toastr.password-reset_done'));
        return redirect()->route('login.index');
    }

}
