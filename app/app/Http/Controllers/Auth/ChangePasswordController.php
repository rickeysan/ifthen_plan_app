<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\User;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function index(){
        logger('ChangePasswordControllerのindexメソッド');
        // dd('fadsoi');
        return view('password/change_pass');
    }
    public function store(ChangePasswordRequest $request){
        logger('ChangePasswordControllerのstoreメソッド');

        // dd($request->session()->get('user_id'));
        // DBから現在のパスワードを取得
        $user_id =$request->session()->get('user_id');
        $user_info = User::find($user_id);
        $user_pass = $user_info->password;
        // dd($user_pass);
        $param = $request->all();
        // dd($param);
        if(Hash::check($param['current_pass'],$user_pass)){
            $user_info->update(['password'=>Hash::make($param['new_pass'])]);
            redirect('home');
        }else{
            dd('一致していない');
            return view('password/change_pass');
        }
    }

}
