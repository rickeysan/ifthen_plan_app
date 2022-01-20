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
        $validate_rule = [
            'email' => 'required | email',
            'password' => 'required',
        ];
        $request->validate($validate_rule);
        $param = $request->all();

        $user_info = User::where('email',$param['email'])->first();
        // パスワードがDBのものと一致しているかチェック
        $request->validate([
            'password'=>[
                function($attribute, $value, $fail){
                    if(!Hash::check($value, $user_info->password)){
                        $fail($attribute.'が違います');
                        logger('不適切なユーザーです');
                    }else{
                        logger('適正ユーザーです');
                    }
                }
            ]
            ]);
        if($user_info !== null && Hash::check($param['password'],$user_info->password)) {
            // ここにセッションを追加する
            $request->session()->put('login_limit',60*60);
            $request->session()->put('login_date',time());
            $request->session()->put('name',$user_info->name);
            $request->session()->put('user_id',$user_info->id);
            // dd($request->session());
            return redirect('home');
        }else{
            // $msg = 'メールアドレスかパスワードが一致しません';
            return view('login');
        }
        // dd($user_info->password);

    }
}
