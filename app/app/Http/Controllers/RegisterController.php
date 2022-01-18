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
        $validata_rule = [
            'email'=>'required|email',
            'name'=>'required',
            'password'=>'required',
            'retype_pass'=>'required',
        ];
        $param = $request->all();
        $this->validate($request,$validata_rule);
        unset($param['_token']);
        unset($param['retype_pass']);
        $param['password'] = Hash::make($param['password']);
        // dd($param);
        $user = new User;
        $user->fill($param)->save();
        return view('home');
    }
}
