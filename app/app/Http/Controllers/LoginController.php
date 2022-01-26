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

        if(Auth::attempt(['email'=>$param['email'],'password'=>$param['password']])){
            // $request->session()->put('login_limit',60*60);
            // $request->session()->put('login_date',time());

            return redirect('home');
        }else{
            return view('login',['msg'=>'パスワードまたはメールアドレスが一致しません']);
        }
    }
}
