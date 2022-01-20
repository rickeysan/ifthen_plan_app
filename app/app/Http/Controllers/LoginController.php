<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        logger('LoginControllerクラスのindexメソッドです');
        // dd(Auth::user());
        return view('login');
    }
    public function store(Request $request){
        logger('LoginControllerクラスのstoreメソッド');
        logger('適正ユーザーかどうか判定します');
        $param = $request->all();
        // dd($param);
        $user_info = User::where('email',$param['email'])->first();
        if($user_info !== null && Hash::check($param['password'],$user_info->password)) {
            logger('適正ユーザーです');
            // ここにセッションを追加する
            $request->session()->put('login_limit',60*60);
            $request->session()->put('login_date',time());
            $request->session()->put('name',$user_info->name);
            $request->session()->put('user_id',$user_info->id);
            // dd($request->session());
            return redirect('home');
        }else{
            logger('不適切なユーザーです');
            return view('login');
        }
        // dd($user_info->password);

    }
}
