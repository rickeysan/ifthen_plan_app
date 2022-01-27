<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    public function index(){
        logger('indexメソッドです');
        return view('register');
    }
    public function store(Request $request){
        logger('storeメソッドです');
        $validate_rule = [
            'email'=>'required|email',
            'name'=>'required',
            'password'=>'required|min:8|confirmed',
            'password_confirmation'=>'required',
        ];
        
        $param = $request->all();
        $this->validate($request,$validate_rule);
        unset($param['_token']);
        unset($param['passowrd_confirmation']);
        $param['password'] = Hash::make($param['password']);
        // dd($param);
        $user = new User;
        $user->fill($param)->save();
        return view('home');
    }
}
