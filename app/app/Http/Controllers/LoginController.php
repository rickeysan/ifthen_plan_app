<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(){
        logger('LoginControllerクラスのindexメソッドです');
        return view('login');
    }
    public function store(Request $request){
        logger('LoginControllerクラスのstoreメソッド');
        logger('適正ユーザーかどうか判定します');
        $param = $request->all();
        // dd($param);
        $user_info = User::where('email',$param['email'])->first();
        if($user_info->password === $param['password']){
            logger('適正ユーザーです');
            // ここにセッションを追加する
            $request->session()->put('login_limit',60*60);
            $request->session()->put('name',$user_info->name);

            return view('home');
        }else{
            logger('不適切なユーザーです');
            return view('login');
        }
        // dd($user_info->password);

    }
}
